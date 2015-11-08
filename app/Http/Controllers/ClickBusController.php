<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ClickBusPlace;
use Input;
use App\Repositories\ClickBusRepository;

class ClickBusController extends Controller {

	private static $url = 'https://api-evaluation.clickbus.com.br/api/v1';

	public function autocompletePlace()
	{
		$query = Input::get('query');
		$query = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), $query);

		$result = ClickBusPlace::whereRaw("lower(place_name) LIKE '%{$query}%'")
			->get()
			->take(15);

		return view('clickbus._listAutocomplete', compact('result'));
	}

	public function getTrips() 
	{
		$from      = Input::get('from');
		$to        = Input::get('to');
		$departure = Input::get('departure');

		$departure = ClickBusRepository::dateFormat($departure);
		$dates = ClickBusRepository::getPrettyDates($departure);

		$result = file_get_contents(self::$url."/trips?from={$from}&to={$to}&departure={$departure}");
		
		$result = ClickBusRepository::parseData(json_decode($result));

		return view('clickbus._listOptions', compact('result', 'dates'));
	}

	public function getTrip() 
	{
		$scheduleId = Input::get('scheduleId');

		$result = file_get_contents(self::$url."/trip?scheduleId={$scheduleId}");
		return $result;
	}

}
