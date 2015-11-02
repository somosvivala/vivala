<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ClickBusPlace;
use Input;

class ClickBusController extends Controller {

	private static $url = 'https://api-evaluation.clickbus.com.br/api/v1';

	public function autocompletePlace()
	{
		$query = Input::get('query') ;

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

		$result = file_get_contents(self::$url."/trips?from={$from}&to={$to}&departure={$departure}");
		return $result;
	}

	public function getTrip() 
	{
		$scheduleId = Input::get('scheduleId');

		$result = file_get_contents(self::$url."/trip?scheduleId={$scheduleId}");
		return $result;
	}

}
