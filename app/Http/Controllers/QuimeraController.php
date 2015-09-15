<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\QuimeraRepository;
use Input;

use Illuminate\Http\Request;

class QuimeraController extends Controller {

	public function quimera()
	{
		$type    = Input::get('url');
		$params  = Input::get('params');
		$method  = Input::get('method');
		$process = Input::get('process');

		$url    = QuimeraRepository::urlDecoder($type);
		$params = QuimeraRepository::serializeParams($params);

		$response = file_get_contents("{$url}?{$params}");

		if ($process) {
			echo "{$url}?{$params}";
			echo QuimeraRepository::processResponse($response, $type);
		}
		else {
			echo $response;
		}
	}

}
