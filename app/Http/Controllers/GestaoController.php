<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use DB;
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
            
                $intervalos = DB::table('perfils')->select(DB::raw("date_trunc('day', created_at) as intervalo"),DB::raw('count(*) as qtd'))->where('created_at', '>', '2015-10-18 14:56:40')->where('created_at', '<', '2016-01-20 14:56:40')->orderBy('intervalo','ASC')->groupBy(DB::raw("intervalo, perfils.id "))->get();
            }
            return view('gestao.index', compact('intervalos') );
	}


}
