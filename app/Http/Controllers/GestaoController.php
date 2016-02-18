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
            return view('gestao.index');
	}

        public function getUsers()
        {
            $data_inicio = Input::get('data_inicio');
            $data_fim = Input::get('data_fim');

            if(!$data_inicio) {
                $data_inicio =  '2015-10-16 05:51:39'; //Dia do primeiro user
            }
            if(!$data_fim) {
                $data_fim = date('Y-m-d H:i:s'); 
            }

            if(Auth::user()->isAdmin()) {
                $intervalos = DB::table('perfils')->select(DB::raw("date_trunc('day', created_at) as intervalo"),DB::raw('count(*) as qtd'))->where('created_at', '>', $data_inicio)->where('created_at', '<', $data_fim)->orderBy('intervalo','ASC')->groupBy(DB::raw("intervalo"))->get();

            }
            return json_encode($intervalos);
        
        }


}
