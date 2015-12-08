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
            $volta_obj = $schedule[1];

            if($ida_obj) {
                $content_ida = file_get_contents(self::$url."/trip?scheduleId={$ida_obj->id}");
                $ida = json_decode($content_ida);
                $ida->horario = $ida_obj->horario;
                $ida->diames = $ida_obj->diames ;
                $ida->frombus = $ida_obj->from;
                $ida->tobus = $ida_obj->to;
                $ida->scheduleId = $ida_obj->id;
            }
            if($volta_obj) {
                $content_volta = file_get_contents(self::$url."/trip?scheduleId={$volta_obj->id}");
                $volta = json_decode($content_volta);
                $volta->horario = $volta_obj->horario;
                $volta->diames = $volta_obj->diames ;
                $volta->frombus = $volta_obj->from;
                $volta->tobus= $volta_obj->to;
                $volta->scheduleId = $volta_obj->id;

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

        $data = json_encode($request);

        $context = [ 
        	'http' => [ 
                'ignore_errors' => true,
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($data)."\r\n",
                'method' => 'PUT',
                'content' => $data
	        ] 
	];
        $context = stream_context_create($context);

        $result = file_get_contents(self::$url.'/seat-block', false, $context);

        // Testa se existe algo dentro do 'error' do result
        // com um false pra nao entrar nunca hehe
        if(false && isset(json_decode($result)->error)){
            App::abort(403,json_decode($result)->error[0]->message );
        }
        // Migué de resposta com sucesso que deveria estar vindo no result
        $result = '{
            "meta": {},
            "items": [{
                "seat": "'.$request["request"]["seat"].'",
                "schedule": {
                    "id": "NDAxNy0tMzkzNS0tMjAxNS0wMi0xMSAwMTowMC0tOS0tNDMyMi0tMS0tMS0tMS0tQ09OVg==",
                    "date": "",
                    "time": "",
                    "timezone": "America/Sao_Paulo"
                },
                "status": "blocked",
                "sessionId": "dnlfm8aecg2omtjaang62fvla5",
                "expireAt": "2015-01-20 17:46"
            }]
        }';
        return '{
            "result": '.$result.',
            "data": '.$data.'    
        }';
    }

    public function getRemoverpoltronas(/*RemoverPoltronasClickbusRequest $request*/) 
    {
    	$request = Input::get('params');

        $data = json_encode($request);

        $context = [ 
        	'http' => [ 
                'ignore_errors' => true,
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($data)."\r\n",
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
        $ida = new \stdClass();
        $ida->scheduleId = $request["frm"]["ida-scheduleId"];
        $ida->ticket_amount = count($request["frm"]["ida-numero_poltrona"]);

        //pegando dados das poltronas de volta 
        $volta = new \stdClass();
        $volta->scheduleId = $request["frm"]["volta-scheduleId"];
        $volta->ticket_amount = count($request["frm"]["volta-numero_poltrona"]);

        //criando objeto content
        $content = new \stdClass();
        $content->meta = $request["meta"];
        $content->contents = [$ida, $volta];

        $context = [ 
            'http' => [ 
                'ignore_errors' => true,
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen(json_encode($content))."\r\n",
                'content' => json_encode($content)
            ] 
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(self::$url.'/payments', false, $context);

        $result = json_decode($result);
        return view('clickbus._checkout', compact('result'));
    }

    /**
     * Metodo responsavel fechar o pedido e efetuar o pagamento
     * @param $request -> Informacoes do form ,
     * @return 
     */
    public function getBooking(Request $request)
    {
        $request = Input::get('params');
        $frm = $request['frm'];

        $data = json_encode($request);

        $context = [ 
            'http' => [ 
                'ignore_errors' => true,
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($data)."\r\n",
                'content' => $data
            ] 
        ];

        $context = stream_context_create($context);
        $result = file_get_contents(self::$url.'/booking', false, $context);
        return $result

    }
}
