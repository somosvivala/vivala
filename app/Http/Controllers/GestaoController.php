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
            
                $intervalos = Perfil::where('created_at', '>', '2015-10-18 14:56:40')->where('created_at', '<', '2016-01-20 14:56:40')->groupBy(DB::raw('DAY(created_at)'))->get();
                $cadastros = Perfil::all();
            }
            return view('gestao.index', compact('cadastros','intervalos') );
	}


}
