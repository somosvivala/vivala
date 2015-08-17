<?php namespace App\Http\Controllers\Conectar;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ConectarController;

use Illuminate\Http\Request;

use App\Interesse;

class InteressesController extends ConectarController {

	/**
	 * Exibe a view referente aos Interesses.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('conectar._interesses');
	}


	public function getAllinteresses()
	{
		return Interesse::all();
	}

}
