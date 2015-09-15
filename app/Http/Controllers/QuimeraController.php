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
		$headers = Input::get('headers');

		$url     = QuimeraRepository::urlDecoder($type);
		$params  = QuimeraRepository::serializeParams($params);
		$headers = isset($headers) ? QuimeraRepository::createHeader($method, $headers) : [];

		$response = isset($headers) ? file_get_contents("{$url}?{$params}", false, $headers) : file_get_contents("{$url}?{$params}");

		if ($process == 'true') {
			echo QuimeraRepository::processResponse($response, $type);
		}
		else {
			echo $response;
		}
	}

}
