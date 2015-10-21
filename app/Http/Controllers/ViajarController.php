<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Chefsclub;

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
            $chefs = new \stdClass();
            $chefs->num_pessoas = array(1,2,3,4,5);
            $chefs->tipo_cozinha = Chefsclub::getTipoCozinhaForSelect()->lists('tipo_cozinha');
            $chefs->descontos = Chefsclub::getDescontoForSelect()->lists('desconto');
            $chefs->restaurantes = Chefsclub::all()->take(10); 

            return view('viajar.index' , compact('chefs') );
	}
}
