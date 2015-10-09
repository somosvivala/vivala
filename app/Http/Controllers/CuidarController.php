<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ong;
use View;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Vaga;
use App\CategoriaOng;

class CuidarController extends VivalaBaseController {

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	// Compartilha as sugestões com as views que forem chamadas por esse controller
	public function getSugestoesOngs($view){
		$sugestoesOngs = Ong::getSugestoes(Auth::user()->entidadeAtiva);
		$view->with('sugestoesOngs', $sugestoesOngs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
         //   $causas = Vaga::all(); //ta quebrando
            $causas = Ong::all();
            $categorias = CategoriaOng::all();
            $cidades = Ong::getCidadesComOngs();
            
            $cidadesArray = array(0 => 'Selecione uma Cidade');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;
        
            return view('cuidar.index', compact('causas','categorias', 'cidades'));
	}
}
