<?php namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClickBusPlace;
use Input;
use App\Repositories\ClickBusRepository;
use App\Http\Requests\SelecionarPoltronasClickbusRequest;

class ClickBusController extends Controller {

	private static $url = 'https://api-evaluation.clickbus.com.br/api/v1';

	public function autocompletePlace()
	{
		$query = Input::get('query');
		$query = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $query);

		$result = ClickBusPlace::whereRaw("lower(place_name) LIKE lower('%{$query}%')")
			->get()
			->take(15);
                
                return view('clickbus._listAutocomplete', compact('result'));
	}

        // Filtra as passagens de onibus 
	public function getTrips() 
	{
		$from      = Input::get('from');
		$to        = Input::get('to');
		$departure = Input::get('departure');
		$type      = Input::get('type');

		$departure = ClickBusRepository::dateFormat($departure);
		$dates = ClickBusRepository::getPrettyDates($departure);

                $url = self::$url."/trips?from={$from}&to={$to}&departure={$departure}";
		$result = file_get_contents($url);
		
		$result = ClickBusRepository::parseData(json_decode($result));

		return view('clickbus._listOptions', compact('result', 'dates', 'type'));
	}

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
                $content_ida = file_get_contents(self::$url."/trip?scheduleId={$ida_obj->id}");
                $ida = json_decode($content_ida);
                $ida->horario = $ida_obj->horario;
                $ida->diames = $ida_obj->diames ;
                $ida->frombus = $ida_obj->from;
                $ida->tobus = $ida_obj->to;
                $ida->scheduleId = $ida_obj->id;
                $ida->horario_chegada = $ida_obj->horario_chegada;
                $ida->classe = $ida_obj->classe;
            }
            if(isset($volta_obj) && isset($content_ida)) {
                $context = [ 
                    'http' => [ 
                        'header' => "Cookie: PHPSESSID=".$ida->sessionId
                    ] 
                ];
                $context = stream_context_create($context);

                $content_volta = file_get_contents(self::$url."/trip?scheduleId={$volta_obj->id}", false, $context);
                $volta = json_decode($content_volta);
                $volta->horario = $volta_obj->horario;
                $volta->diames = $volta_obj->diames ;
                $volta->frombus = $volta_obj->from;
                $volta->tobus= $volta_obj->to;
                $volta->scheduleId = $volta_obj->id;
                $volta->horario_chegada = $volta_obj->horario_chegada;
                $volta->classe = $volta_obj->classe;
            }

            return view('clickbus._listPoltronas', compact('ida', 'volta', 'from', 'to' ));
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
        $data = json_encode($request);


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

        $result = file_get_contents(self::$url.'/seat-block', false, $context);

        // Testa se existe algo dentro do 'error' do result
        if( isset(json_decode($result)->error)){
            App::abort(403,json_decode($result)->error[0]->message );
        }
       
        // Retorna o resultado e todos os dados recebidos
        return '{
            "result": '.$result.',
            "data": '.$data.'    
        }';
    }

    public function getRemoverpoltronas(/*RemoverPoltronasClickbusRequest $request*/) 
    {
    	$request = Input::get('params');

        $sessionId = $request['request']["sessionId"];
        
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

        $result = file_get_contents(self::$url.'/seat-block', false, $context);

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
        $result = file_get_contents(self::$url.'/payments', false, $context);
        $result = json_decode($result);

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
        $Ida->classe = $request["frm"]["ida-classe"];
        
        return view('clickbus._checkout', compact('result', 'passagens', 'Ida', 'Volta'));
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

        $data = json_encode($request);

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
        $result = file_get_contents(self::$url.'/booking', false, $context);
        return $result;
    }
}
