<?php namespace App\Http\Controllers\Viajar;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViajarController;

use Illuminate\Http\Request;

class MontarViagemController extends ViajarController {

	/**
	* Exibe a view referente aos Interesses.
	*
	* @return Response
	*/
	public function getIndex()
	{
		return view('viajar._montarviagem');
	}
}
