<?php namespace App\Http\Controllers\Viajar;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VerPacotesController extends Controller {

	/**
	 * Exibe a view referente aos Interesses.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('viajar._verpacotes');
	}
}
