<?php namespace App\Http\Controllers\Conectar;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ConectarController;

use Illuminate\Http\Request;

class DiarioViagemController extends ConectarController {
	/**
	* Exibe a view referente aos Roteiros.
	*
	* @return Response
	*/
	public function getIndex()
	{
		return view('conectar._diarioviagem');
	}
}
