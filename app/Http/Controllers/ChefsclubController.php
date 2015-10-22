<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Chefsclub;
use Illuminate\Http\Request;

class ChefsclubController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

        public function getBusca()
        {
            $tipo_cozinha = Chefsclub::getTipoCozinhaForSelect();
            $descontos = Chefsclub::getDescontoForSelect()->lists('desconto');
            $restaurantes = Chefsclub::all()->take(10); 
            
            return view('chefsclub.listarestaurantes', compact('tipo_cozinha', 'descontos', 'restaurantes'));
        }
}
