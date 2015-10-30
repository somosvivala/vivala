<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ClickBusPlace;
use Input;

class ClickBusController extends Controller {

	public function autocompletePlace()
	{
		$query = Input::get('query');

		$result = ClickBusPlace::whereRaw("lower(place_name) LIKE '%{$query}%'")
			->get()
			->take(15);

		print(json_encode($result));
	}

}
