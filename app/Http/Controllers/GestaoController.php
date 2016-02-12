<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use App\Perfil;

class GestaoController extends Controller {

	/**
	 * Retorna a view inicial de gestão 
	 *
	 * @return View
	 */
	public function getHome()
	{

            if(Auth::user()->isAdmin()) {
            
                $cadastros = Perfil::all();
            }
            return view('gestao.index', compact('cadastros') );
	}


}
