<?php namespace App\Http\Controllers\Viajar;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViajarController;

use Illuminate\Http\Request;

class CotarViagensController extends ViajarController {

	/**
	 * Exibe a view referente aos Interesses.
	 *
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$num_adultos = 10;
		$num_criancas = 10;
		return view('viajar._cotacaoviagens', compact('num_adultos, num_criancas'));
	}

}
