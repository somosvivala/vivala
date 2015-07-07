<?php namespace App\Http\Controllers\Cuidar;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CuidarController;

use Illuminate\Http\Request;

class AlbunsController extends CuidarController {

	/**
	* Exibe a view referente aos Interesses.
	*
	* @return Response
	*/
	public function getIndex()
	{
		return view('cuidar._albuns');
	}
}
