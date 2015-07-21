<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ong;
use View;
use Auth;
use Illuminate\Http\Request;

class CuidarController extends VivalaBaseController {

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	// Compartilha as sugestões com as views que forem chamadas por esse controller
	public function getSugestoesOngs($view){
		$sugestoesOngs = Ong::getSugestoes(Auth::user());
		$view->with('sugestoesOngs', $sugestoesOngs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('cuidar.index');
	}

}
