<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

use App\Perfil;

use Illuminate\Http\Request;

class ConectarController extends Controller {

	public function __construct(){
		// Compartilha as sugestões com as views que forem chamadas por esse controller
		$sugestoesViajantes = Perfil::all();
		View::share('sugestoesViajantes', $sugestoesViajantes);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('conectar.index');
	}

}
