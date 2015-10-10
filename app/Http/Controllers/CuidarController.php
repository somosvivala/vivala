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
            $causas = Vaga::all(); 
            $categorias = Vaga::getCategoriasComVagas();
            $cidades = Vaga::getCidadesComVagas();
            $ongs = Vaga::getOngsComVagas();            

            $cidadesArray = array(null => 'Selecione uma Cidade');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;

            //Montando array de ongs para select
            $ongsArray = array(null => 'Selecione uma Ong');
            foreach ($ongs as $ong)
            {
                $ongsArray[$ong->id] = $ong->nome;
            }
            $ongs = $ongsArray;

            //Montando array de categorias para select
            $categoriasArray = array(null => 'Selecione uma Categoria'); 
            foreach ($categorias as $categoria)
            {
                $categoriasArray[$categoria->id] = $categoria->nome;
            }
            $categorias = $categoriasArray;
     
            return view('cuidar.index', compact('causas','categorias', 'cidades', 'ongs'));
	}
}
