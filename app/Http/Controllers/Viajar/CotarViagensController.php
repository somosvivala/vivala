<?php namespace App\Http\Controllers\Viajar;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViajarController;

use Illuminate\Http\Request;

class CotarViagensController extends ViajarController {

	/**
	 * Exibe a view referente ao Form de Cotação de Viagens
	 *
	 * @return View
	 */
	public function getIndex()
	{
		$configuracoesForm = new \stdClass();
		$configuracoesForm->max_nro_adultos = 10;
		$configuracoesForm->max_nro_criancas = 10;

		return view('viajar._cotacaoviagens', compact('configuracoesForm'));
	}

	public function getForm()
	{

		return view('viajar._cotacaoviagens-sucesso');
	}
}
