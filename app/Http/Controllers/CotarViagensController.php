<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CotarViagensRequest;
use App\Http\Controllers\Controller;
use Request;

class CotarViagensController extends Controller {

	public function getForm(CotarViagensRequest $request)
	{
		return dd('passou pela REQUEST');
	}

}
