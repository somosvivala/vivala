<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;
use View;
use Auth;
use Illuminate\Http\Request;
use App\Chefsclub;
use Input;

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
            $tipo_cozinha       = Chefsclub::getTipoCozinhaForSelect();
            $descontos          = Chefsclub::getDescontoForSelect()->lists('desconto');
            $cidades            = Chefsclub::getCidadeForSelect();
            $restaurantes       = Chefsclub::all()->take(10); 
            $pessoas            = Chefsclub::getQuantidadeForSelect(true);
            $restaurantes_total = count(Chefsclub::all());

            return view('viajar.index' , compact('restaurantes', 'tipo_cozinha', 'descontos', 'restaurantes_total', 'cidades', 'pessoas') );
	}

    public function filtro()
    {
        $type  = Input::get('tipo');
        $promo = Input::get('desconto');
        $city  = Input::get('cidade');
        $page  = Input::get('page');

        $restaurantes = Chefsclub::getRestaurant(compact(
            'type',
            'promo',
            'city'
        ));

        $restaurantes_total = count($restaurantes);

        return view('chefsclub.listarestaurantes', compact('restaurantes', 'restaurantes_total'));
    }
}
