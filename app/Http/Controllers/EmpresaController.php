<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use App;

class EmpresaController extends Controller {
	
	/**
	 * Mostra a pagina inicial da Empresa
	 * @param   String 			 $prettyUrl 	  Se acessado diretamente, leva a suposta prettyUrl
	 * @return  View             index.blade.php
	 */
	public function index($prettyUrl = null) {

		if(!$prettyUrl && !Session::has('empresa')) {
			App::abort(404);
		}

		if (Session::has('empresa')) {
			$empresa = Session::get('empresa');
		} else {
			$prettyUrl = App\PrettyUrl::all()->where('url', $prettyUrl)->first();
			if (!is_null($prettyUrl)) {
				$empresa = App\Empresa::find($prettyUrl->prettyurlable_id);
			} else {
				App::abort(404);
			}
		}
	
		dd('inside index of EmpresaController.php -> ', $empresa);

}
}
