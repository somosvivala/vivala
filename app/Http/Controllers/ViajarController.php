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
            $pessoas            = Chefsclub::getQuantidadeForSelect();
            $horarios           = Chefsclub::getHorarios(true);
            $restaurantes_total = count(Chefsclub::all());

            $page = 1;

            return view('viajar.index' , compact(
                'restaurantes',
                'tipo_cozinha',
                'descontos',
                'restaurantes_total',
                'cidades',
                'pessoas',
                'horarios',
                "page"
            ));
	}

    public function filtro()
    {
        $type     = Input::get('tipo');
        $promo    = Input::get('desconto');
        $city     = Input::get('cidade');
        $page     = Input::get('page');
        $quantity = Input::get('qtd');
        $time     = Input::get('horario');
        $date     = Input::get('data');

        if (strlen($date) > 0) {
            $date = str_replace('/', '-', $date);
            $date = date('w', strtotime($date))+1;
        }

        $restaurantes = Chefsclub::getRestaurant(compact(
            'type',
            'promo',
            'city',
            'date',
            'quantity',
            'time'
        ));

        $restaurantes_total = count($restaurantes);
        $restaurantes = array_slice($restaurantes, ($page - 1)*10, 10);

        return view('chefsclub.listarestaurantes', compact('restaurantes', 'restaurantes_total', 'page'));
    }
}
