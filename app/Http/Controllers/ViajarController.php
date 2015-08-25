<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;
use View;
use Auth;
use Illuminate\Http\Request;

class ViajarController extends VivalaBaseController {

	var $sugestoesEmpresas;

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	// Compartilha as sugestões com as views que forem chamadas por esse controller
	public function getSugestoesEmpresas($view){
		$sugestoesEmpresas = Empresa::getSugestoes(Auth::user()->entidadeAtiva);
		$view->with('sugestoesEmpresas', $sugestoesEmpresas);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('viajar.index' );
	}
}
