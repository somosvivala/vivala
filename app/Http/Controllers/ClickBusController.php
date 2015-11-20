<?php namespace App\Http\Controllers;

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
            $scheduleId = Input::get('scheduleId');
            $from = Input::get('from');
            $to = Input::get('to');
            $result     = [];

            foreach ($scheduleId as $id) {
                array_push($result, file_get_contents(self::$url."/trip?scheduleId={$id}"));
            }

            // Envia dados de ida e volta separados
            if(isset($result[0]))
                $ida = json_decode($result[0]);
            if(isset($result[1]))
                $volta = json_decode($result[1]);

            return view('clickbus._listPoltronas', compact('ida', 'volta', 'from', 'to'));
	}



        /**
         * Metodo que recebe o ajax do formulario de poltronas,
         * @param $request -> Usa da SelecionarPoltronasClickbusRequest, 
         * portanto se chegou aqui é valido
         * @return Retorna a view de checkout
         */ 
        public function Selecionarpoltronas(SelecionarPoltronasClickbusRequest $request) 
        {
            $nome = $request->nome;
            $documento = $request->documento;
            return view('clickbus._checkout', compact('nome', 'documento'));
        }





}
