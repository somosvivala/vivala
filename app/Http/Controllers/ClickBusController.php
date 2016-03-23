<?php namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClickBusPlace;
use App\CompraClickbus;
use App\CompraClickbusPoltrona;
use App\ClickBusCompany;
use Input;
use App\Repositories\ClickBusRepository;
use App\Http\Requests\SelecionarPoltronasClickbusRequest;
use Auth;
use App\Events\ClickBusCompraFinalizada;

class ClickBusController extends Controller {

    // ClickBus [BUSCA]: Autocomplete do filtro de busca das passagens de onibus
	public function autocompletePlace()
	{
		$query = Input::get('query');
		$query = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $query);

		$result = ClickBusPlace::whereRaw("lower(place_name) LIKE lower('%{$query}%')")
			->get()
			->take(15);

      return view('clickbus._listAutocomplete', compact('result'));
	}

    // ClickBus [BUSCA]: Filtra as passagens de onibus
	public function getTrips()
	{
		// Pega os campos dos inputs
		$from      = Input::get('from');
		$to        = Input::get('to');
		$departure = Input::get('departure');
		$type      = Input::get('type');

		// Se o campo departure existe, então mando $departure para dateFormat e getPrettyDates
        if($departure){
            $departure = ClickBusRepository::dateFormat($departure);
            $dates = ClickBusRepository::getPrettyDates($departure);
        }

        // Montando a URL
        $url = ClickBusRepository::$url."/trips?from={$from}&to={$to}&departure={$departure}";

        // Ignorando possíveis erros 404 no retorno do servidor da ClickBus
        $context = stream_context_create(array(
            'http' => array('ignore_errors' => true),
        ));

        // Recebo o resultado JSON da ClickBus, ignorando os possíveis erros 404
        $result = file_get_contents($url, false, $context);

        // Transformo o JSON em string
        $decoded = json_decode($result);

        // Se o $decoded não possuir nenhum error internamente, envio para o parseData, para ser tratado e retornar a view ._listOptions
        if(isset($decoded) && !isset($decoded->{"error"})){
            $result = ClickBusRepository::parseData($decoded);
            $places = array("from" => $from, "to" => $to);
            return view('clickbus._listOptions', compact('result', 'dates', 'type', 'places'));
        } else {
        // Caso o $decoded tenha algum error internamente, envio o para o parseError, para ser tratado e retornar ao JS
            $result = ClickBusRepository::parseError($decoded);
            return $result;
        }
	}

    // ClickBus [BUSCA]: Fecha a viagem Ida/Volta
	public function getTrip()
	{
            $schedule = json_decode(Input::get('schedule'));
            $from = Input::get('from');
            $to = Input::get('to');
            $result     = [];

            // Envia dados de ida e volta separados
            $ida_obj = $schedule[0];
            if(isset($schedule[1]))
                $volta_obj = $schedule[1];

            if($ida_obj) {
                $context = stream_context_create(array(
                    'http' => array('ignore_errors' => true),
                ));
                $content_ida = file_get_contents(ClickBusRepository::$url."/trip?scheduleId={$ida_obj->id}", false, $context);
                $ida = json_decode($content_ida);


                if(isset($ida) && isset($ida->{"error"})){
                    $result = ClickBusRepository::parseError($ida);
                    return $result;
                }

                //adicionando outros campos do formulario para serem passados
                //juntos.
                $ida->horario = $ida_obj->horario;
                $ida->diames = $ida_obj->diames ;
                $ida->frombus = $ida_obj->from;
                $ida->tobus = $ida_obj->to;
                $ida->scheduleId = $ida_obj->id;
                $ida->horario_chegada = $ida_obj->horario_chegada;
                $ida->classe = $ida_obj->classe;

            }

            if (isset($volta_obj) && isset($content_ida)) {
                $sessionId = $ida->sessionId;

                $context = [
                    'http' => [
                        'ignore_errors' => true,
                        'header' => "Cookie: PHPSESSID=".$sessionId."\r\n"

                    ]
                ];
                $context = stream_context_create($context);

                $content_volta = file_get_contents(ClickBusRepository::$url."/trip?scheduleId={$volta_obj->id}", false, $context);
                $volta = json_decode($content_volta);

                if(isset($volta) && isset($volta->{"error"})){
                    $result = ClickBusRepository::parseError($volta);
                    return $result;
                }

                $volta->horario = $volta_obj->horario;
                $volta->diames = $volta_obj->diames ;
                $volta->frombus = $volta_obj->from;
                $volta->tobus= $volta_obj->to;
                $volta->scheduleId = $volta_obj->id;
                $volta->horario_chegada = $volta_obj->horario_chegada;
                $volta->classe = $volta_obj->classe;
            }


            //Nao retornando a view direto pois precisamos do
            //valor do sessionId do retorno da request
            $view = view('clickbus._listPoltronas', compact('ida', 'volta', 'from', 'to' ))->render();
            return array('view' => $view, 'sessionId' => $ida->sessionId);
	}

    /**
     * Metodo que recebe o ajax do formulario de poltronas,
     * @param $request -> Usa da SelecionarPoltronasClickbusRequest,
     * portanto se chegou aqui é valido
     * @return Retorna a view de checkout
     */
    public function getSelecionarpoltronas(/*SelecionarPoltronasClickbusRequest $request*/)
    {
    	$request = Input::get('params');

        $sessionId = $request['request']["sessionId"];
        $request['request']['passenger']['gender'] = 'M';
        $request['request']['schedule']['date'] = ClickBusRepository::dateFormat($request['request']['schedule']['date']);
        $data = json_encode($request);

        $sessionId = self::getSession($sessionId);

        $context = [
        	'http' => [
                'ignore_errors' => true,
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($data)."\r\n".
                            "Cookie: PHPSESSID=".$sessionId,
                'method' => 'PUT',
                'content' => $data
	        ]
	    ];
        $context = stream_context_create($context);
        $result = file_get_contents(ClickBusRepository::$url.'/seat-block', false, $context);

        // Testa se existe algo dentro do 'error' do $result
        if(isset(json_decode($result)->error)){

            $result = ClickBusRepository::parseError(json_decode($result));
            // Retorno pro JS do erro para ser exibido em sweetAlert
            return $result;
        }

        // Retorna o resultado e todos os dados recebidos
        return array("result" => json_decode($result), "data" => $request);

    }

    public function getRemoverpoltronas(/*RemoverPoltronasClickbusRequest $request*/)
    {
    	$request = Input::get('params');

        $sessionId = $request['request']["sessionId"];

        $sessionId = self::getSession($sessionId);

        $data = json_encode($request);

        $context = [
        	'http' => [
                'ignore_errors' => true,
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($data)."\r\n".
                            "Cookie: PHPSESSID=".$sessionId,
                'method' => 'DELETE',
                'content' => $data
	        ]
            ];
        $context = stream_context_create($context);

        $result = file_get_contents(ClickBusRepository::$url.'/seat-block', false, $context);

        // Testa se existe algo dentro do 'error' do $result
        if(isset(json_decode($result)->error)){
            $result = ClickBusRepository::parseError(json_decode($result));
            // Retorno pro JS do erro para ser exibido em sweetAlert
            return $result;
        }

        return $result;
    }

    /**
     * Metodo responsavel por servir a view de checkout, com as opçoes de
     * pagamento
     * @param $request -> Informacoes do form de selecao de poltronas,
     * @return View
     */
    public function getPayment(Request $request)
    {
        $request = Input::get('params');
        $frm = $request['frm'];
        //pegando dados das poltronas de ida
        $Ida = new \stdClass();
        $Ida->scheduleId = $request["frm"]["ida-scheduleId"];
        $Ida->ticket_amount = count($request["frm"]["ida-numero_poltrona"]);

        //flag para testar se foi requisitado alguma poltrona para a volta
        $existeVolta = array_key_exists("volta-numero_poltrona",$request["frm"]);

        if ($existeVolta) {
            //pegando dados das poltronas de volta
            $Volta = new \stdClass();
            $Volta->scheduleId = $request["frm"]["volta-scheduleId"];
            $Volta->ticket_amount = count($request["frm"]["volta-numero_poltrona"]);
        }

        $sessionId = $request["frm"]["ida-sessionId"];
        $sessionId = self::getSession($sessionId);

        //criando objeto content
        $content = new \stdClass();
        $content->meta = $request["meta"];
        $content->contents = ($existeVolta ? [$Ida, $Volta] : [$Ida]);

        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen(json_encode($content))."\r\n".
                            "Cookie: PHPSESSID=".$sessionId,
                'content' => json_encode($content)
            ]
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(ClickBusRepository::$url.'/payments', false, $context);
        $decoded = json_decode($result);

        //Montando objeto $Ida
        $Ida->numero_poltrona = $request['frm']['ida-numero_poltrona'];
        $Ida->documento = $request['frm']['ida-documento'];
        $Ida->nome = $request['frm']['ida-nome'];
        $Ida->birthday = $request['frm']['ida-birthday'];
        $Ida->email = $request['frm']['ida-email'];
        $idaScheduleId = $request['frm']['ida-scheduleId'];

        if ($existeVolta) {
            //Montando objeto $Volta
            $Volta->numero_poltrona = $request['frm']['volta-numero_poltrona'];
            $Volta->documento = $request['frm']['volta-documento'];
            $Volta->nome = $request['frm']['volta-nome'];
            $Volta->birthday = $request['frm']['volta-birthday'];
            $Volta->email = $request['frm']['volta-email'];
            $voltaScheduleId = $request['frm']['volta-scheduleId'];
        }

        $passagens = array();
        //tratando Ida
        if (is_array($Ida->numero_poltrona)) {
            $i = 0;
            foreach($Ida->numero_poltrona as $numpoltrona) {
                $Passagem = new \stdClass();
                $Passagem->document = $Ida->documento[$i];
                $Passagem->seat = $numpoltrona;
                $Passagem->birthday = $Ida->birthday[$i];
                $Passagem->email = $Ida->email[$i];
                $Passagem->seatReservation = $idaScheduleId;


                $nome = explode(" ", $Ida->nome[$i]);
                $Passagem->firstName = array_shift($nome);
                $Passagem->lastName = implode(" ", $nome);

                $passagens[] = $Passagem;
                $i++;
            }
        }else{
            $Passagem = new \stdClass();
            $Passagem->document = $Ida->documento;
            $Passagem->seat = $Ida->numero_poltrona;
            $Passagem->birthday = $Ida->birthday;
            $Passagem->email = $Ida->email;
            $Passagem->seatReservation = $idaScheduleId;

            $nome = explode(" ", $Ida->nome);
            $Passagem->firstName = array_shift($nome);
            $Passagem->lastName = implode(" ", $nome);

            $passagens[] = $Passagem;
        }

        if ($existeVolta) {
            //tratando Volta
            if (is_array($Volta->numero_poltrona)) {
                $i = 0;
                foreach($Volta->numero_poltrona as $numpoltrona) {
                    $Passagem = new \stdClass();
                    $Passagem->document = $Volta->documento[$i];
                    $Passagem->seat = $numpoltrona;
                    $Passagem->birthday = $Volta->birthday[$i];
                    $Passagem->email = $Volta->email[$i];
                    $Passagem->seatReservation = $voltaScheduleId;

                    $nome = explode(" ", $Volta->nome[$i]);
                    $Passagem->firstName = array_shift($nome);
                    $Passagem->lastName = implode(" ", $nome);

                    $passagens[] = $Passagem;
                    $i++;
                }
            }else{
                $Passagem = new \stdClass();
                $Passagem->document = $Volta->documento;
                $Passagem->seat = $Volta->numero_poltrona;
                $Passagem->birthday = $Volta->birthday;
                $Passagem->email = $Volta->email;
                $Passagem->seatReservation = $voltaScheduleId;

                $nome = explode(" ", $Volta->nome);
                $Passagem->firstName = array_shift($nome);
                $Passagem->lastName = implode(" ", $nome);

                $passagens[] = $Passagem;
            }

            // Incrementando os dados de Ida e Volta com os dados do ônibus para
            // enviar para a view
            $Volta->to = $request["frm"]["volta-to"];
            $Volta->from = $request["frm"]["volta-from"];
            $Volta->diames = $request["frm"]["volta-diames"];
            $Volta->horario = $request["frm"]["volta-horario"];
            $Volta->horario_chegada = $request["frm"]["volta-horario-chegada"];
            $Volta->company = $request["frm"]["volta-company"];
            $Volta->companyId = ClickBusCompany::where('nome', $request["frm"]["volta-company"])->first()->id;
            $Volta->classe = $request["frm"]["volta-classe"];
        }

        // Incrementando os dados de Ida e Volta com os dados do ônibus para
        // enviar para a view
        $Ida->to = $request["frm"]["ida-to"];
        $Ida->from = $request["frm"]["ida-from"];
        $Ida->diames = $request["frm"]["ida-diames"];
        $Ida->horario = $request["frm"]["ida-horario"];
        $Ida->horario_chegada = $request["frm"]["ida-horario-chegada"];
        $Ida->company = $request["frm"]["ida-company"];
        $Ida->companyId = ClickBusCompany::where('nome', $request["frm"]["ida-company"])->first()->id;
        $Ida->classe = $request["frm"]["ida-classe"];

        // Se o $decoded não possuir nenhum error internamente, retorno os dados tratados para a view _checkout
        if(isset($decoded) && !isset($decoded->{"error"})){
          return [
            //Como não estamos devolvendo a view diretamente (return view('nome', ...),
            //precisamos chamar o ->render() para obter o html
                "html" => view('clickbus._checkout', compact('decoded', 'passagens', 'Ida', 'Volta'))->render(),
                "session" => $sessionId
            ];
        } else {
        // Caso o $decoded tenha algum error internamente, envio o para o parseError, para ser tratado e retornar ao JS
            $result = ClickBusRepository::parseError($decoded);
            if (env('APP_ENV') == 'local') {
                $result['debug'] = $decoded;
            }
            return $result;
        }
    }

    /**
     * Metodo responsavel fechar o pedido e efetuar o pagamento
     * @param $request -> Informacoes do form ,
     * @return
     */
    public function getBooking(Request $request)
    {
        $request = Input::get('params');
        $sessionId = $request['request']['sessionId'];

        //convertendo para int o valor em total
        $request['request']["buyer"]["payment"]["total"] = (int) $request['request']["buyer"]["payment"]["total"];
        $data = json_encode($request);

        //recuperando a sessao com a clickbus para garantir que esta atualizada.
        $sessionId = self::getSession($sessionId);

        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($data)."\r\n".
                            "Cookie: PHPSESSID=".$sessionId,
                'content' => $data
            ]
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(ClickBusRepository::$url.'/booking', false, $context);
        $decoded = json_decode($result);
        $success = isset($decoded) ? !isset($decoded->{"error"}) : false;

        //Se for success organiza as informacoes
        //para criar um registro na tabela de compras da clickbus
        if ($success)
        {
            $itens = $decoded->{"content"}->{"items"};
            $userId = Auth::user()->id;

            $localizer = $decoded->{"content"}->{"localizer"};
            $orderId = $decoded->{"content"}->{"id"};
            $buyerFirstname = $request['request']["buyer"]["firstName"];
            $buyerLastname = $request['request']["buyer"]["lastName"];
            $buyerBirthday = $request['request']["buyer"]["birthday"];
            $buyerDocument = $request['request']["buyer"]["document"];
            $buyerEmail = $request['request']["buyer"]["email"];
            $buyerPhone = $request['request']["buyer"]["phone"];
            $paymentMethod = $decoded->{"content"}->{"payment"}->{"method"};
            $voucher = array_key_exists('voucher', $request['request']) ? $request['request']['voucher'] : null;
            $statusPagamento = $decoded->{"content"}->{"status"};
            $descontoTotal = array_key_exists('desconto', $request['extra']) ? $request['extra']['desconto'] : null;
            $taxas = array_key_exists('taxas', $request['extra']) ? $request['extra']['taxas'] : null;
            $total = $decoded->{"content"}->{"payment"}->{"total"};
            $quantidadePassagens = count($itens);

            //Criando registro da compra no BD, usando da coluna pagamento_confirmado,
            //para quando o pagamento for por paypal ou cartao de debito,
            //mediante a confirmacao de pagamento (getOrders ou disparo da clickbus)
            $compra = CompraClickbus::create([
                'user_id' => $userId,
                'localizer' => $localizer,
                'clickbus_order_id' => $orderId,
                'buyer_firstname' => $buyerFirstname,
                'buyer_lastname' => $buyerLastname,
                'buyer_birthday' => $buyerBirthday,
                'buyer_document' => $buyerDocument,
                'buyer_phone' => $buyerPhone,
                'buyer_email' => $buyerEmail,
                'payment_method' => $paymentMethod,
                'voucher' => $voucher,
                'desconto_total' => $descontoTotal,
                'taxas' => $taxas,
                'total' => $total,
                'status' => $statusPagamento
            ]);

            //Como as viagens sao compostas de até 2 trips (ida e volta), nao
            //tem problema em re-settar as variaveis a cada iteração, os valores
            //sao os mesmos para um mesmo tipo de trip (departure x return)
            foreach ($itens as $Trip)
            {
                $trip_id = $Trip->{"trip_id"};

                //se existirem localizers para as poltronas
                if (property_exists($Trip, "localizer")) {
                    $trip_localizer = $Trip->{"localizer"};
                }

                $departure_waypoint_id = $Trip->{"departure"}->{"waypoint"};
                $departure_id = ClickBusPlace::where('item_id', $departure_waypoint_id)->get()->first()->id;
                $arrival_waypoint_id =  $Trip->{"arrival"}->{"waypoint"};
                $arrival_id = ClickBusPlace::where('item_id', $arrival_waypoint_id)->get()->first()->id;

                $departure_trip_date = $Trip->{"departure"}->{"schedule"}->{"date"} . " " . $Trip->{"departure"}->{"schedule"}->{"time"} . ":00";
                $arrival_trip_date = $Trip->{"arrival"}->{"schedule"}->{"date"} . " " . $Trip->{"arrival"}->{"schedule"}->{"time"} . ":00";
                $passenger_email = $Trip->{"passenger"}->{"email"};
                $seat_number = $Trip->{"seat"}->{"name"};
                $passenger_document = $Trip->{"passenger"}->{"document"};
                $passenger_name = $Trip->{"passenger"}->{"firstName"} . $Trip->{"passenger"}->{"lastName"};
                $subTotal = $Trip->{"subtotal"};

                $idaSlug = array_key_exists('ida-slug', $request['extra'])
                    ? $request['extra']['ida-slug'] : null;

                //Comparando o local de embarque para saber determinar a viacao
                if ($idaSlug == ClickBusPlace::find($departure_id)->slug) {
                    $viacao_id = $request['extra']['ida-company-id'];
                }

                else {
                    $viacao_id = array_key_exists('volta-company-id', $request['extra'])
                        ? $request['extra']['volta-company-id'] : null;
                }

                $compra->poltronas()->save(CompraClickbusPoltrona::create([
                    'departure_id' => $departure_id,
                    'arrival_id' => $arrival_id,
                    'viacao_id' => $viacao_id,
                    'localizer' => $trip_localizer,
                    'passenger_name' => $passenger_name,
                    'passenger_document_number' => $passenger_document,
                    'seat_number' => $seat_number,
                    'passenger_email' => $passenger_email,
                    'departure_time' => $departure_trip_date,
                    'arrival_time' => $arrival_trip_date,
                    'subtotal' => $subTotal
                    ]));
            }

            $compra->push();

            //switch para formatar a $redirectUrl corretamente (caso debitcard)
            switch ($paymentMethod)
            {
                case "payment.debitcard" :
                    $redirectUrl = $decoded->{"content"}->{"payment"}->{"continuePaymentURL"};
                    break;

                case "payment.creditcard" :
                    $redirectUrl = "";
                    break;
            }

            $retorno = [
                "success" => true,
                "forma_pagamento" => $paymentMethod,
                "redirectUrl" => $redirectUrl,
                "ida_departure" => ClickBusPlace::find($departure_id)->place_name,
                "ida_arrival" => ClickBusPlace::find($arrival_id)->place_name,
                "volta_departure" => ClickBusPlace::find($arrival_id)->place_name,
                "volta_arrival" => ClickBusPlace::find($departure_id)->place_name,
                "quantidade" => $compra->quantidade_passagens,
                "ida_data" => $compra->ida_trip_date,
                "volta_data" => $compra->volta_trip_date,
                "total" => $compra->total,

								"view" => view('clickbus._success', compact('compra'))->render(),
            ];

            // Chama o evento de compra finalizada para enviar emails
            event(new ClickBusCompraFinalizada($compra));

        //Se a compra tiver falhado
        } else {
            $retorno = ClickBusRepository::parseError($decoded);
        }

        //return erro ou success
        return $retorno;
    }

    /**
     * Bate no endpoint de /booking/voucher e retorna o resultado ou erro.
     */
    public function getVoucher()
    {
    	$request = Input::all();

        $sessionId = self::getSession($request['request']['sessionId']);

        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Cookie: PHPSESSID=".$sessionId,
                'content' => json_encode($request)
                ]
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(ClickBusRepository::$url.'/booking/voucher', false, $context);
        $decoded = json_decode($result);

        if(isset($decoded) && isset($decoded->{"error"})){
            $decoded = ClickBusRepository::parseError($decoded);
        }

        if (is_object($decoded)) {
            $decoded->session = $sessionId;
        }

        return json_encode($decoded);
    }

		/* Tela de SUCESSO após finalização da compra
		public function getSuccess(){
			$view = view('clickbus._success')->render();
		}*/

    /*
     * Recupera/Refresh na sessao atual com a ClickBus
     *
     * @param @session - sessionId advindo da ClickBus
     */
    private static function getSession($session)
    {
        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'GET',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Cookie: PHPSESSID=".$session
            ]
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(ClickBusRepository::$url.'/session', false, $context);
        $decoded = json_decode($result);

        return $decoded->content;
    }
}
