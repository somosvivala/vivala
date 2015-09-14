<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\QuimeraRepository;
use Input;

use Illuminate\Http\Request;

class QuimeraController extends Controller {

	public function quimera()
	{
		$url    = Input::get('url');
		$params = Input::get('params');
		$method = Input::get('method');

		$params = QuimeraRepository::paramsToGet($params);

		$response = file_get_contents("{$url}?{$params}");
		echo $response;
	}

}
