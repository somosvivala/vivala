<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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


}
