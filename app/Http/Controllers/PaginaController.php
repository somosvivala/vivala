<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Ong;
use App\Empresa;


class PaginaController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Retorna ate 3 paginas dentre as Ongs/Empresas de um Usuario
	 * @return Array<Ong|Empresa> 
	 */
	public function getMenu($view = null) 
	{
            $paginas = Auth::user()->paginas;
            $paginas = $paginas->take(3);
            // dd($paginas);
            $view->with('paginas', $paginas);
	}

	public function getCriarPagina() 
	{
		

	}

}
