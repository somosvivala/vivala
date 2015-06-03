<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App;


class OngController extends Controller {


	/**
	 * Mostra a pagina da ong
	 * @param   String 			 $prettyUrl 	  Se acessado diretamente, leva a suposta prettyUrl
	 * @return  View             index.blade.php
	 */
	public function index($prettyUrl = null) {

		if(!$prettyUrl && !Session::has('ong')) {
			App::abort(404);
		}

		if (Session::has('ong')) {
			$ong = Session::get('ong');
		} else {
			$prettyUrl = App\PrettyUrl::all()->where('url', $prettyUrl)->first();
			if (!is_null($prettyUrl)) {
				$ong = App\Ong::find($prettyUrl->prettyurlable_id);
			} else {
				App::abort(404);
			}
		}
	
		dd('inside index of OngController.php -> ', $ong);

}





}
