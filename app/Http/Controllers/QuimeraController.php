<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\QuimeraRepository;
use Input;

use Illuminate\Http\Request;

class QuimeraController extends Controller {

	public function quimera()
	{
		$params = $dataParams = Input::get('params');

		$type    = Input::get('url');
		$method  = Input::get('method');
		$process = Input::get('process');
		$headers = Input::get('headers');

		if (substr($type, 0, 4) == 'http') {
			$response = utf8_encode(file_get_contents($type));
			$type     = Input::get('type');
		} else {
			$url     = QuimeraRepository::urlDecoder($type);
			$params  = QuimeraRepository::serializeParams($params);
			$headers = isset($headers) ? QuimeraRepository::createHeader($method, $headers) : [];
			
			$response = !is_array($headers) ? file_get_contents("{$url}?{$params}", false, $headers) : file_get_contents("{$url}?{$params}");
		}

		if ($process == 'true') {
			if (array_key_exists('data', $dataParams)) {
				$output = QuimeraRepository::processResponse($response, $type, $dataParams['data']);
			} else {
				$output = QuimeraRepository::processResponse($response, $type);
			}
			if (is_array($output) && array_key_exists('blade', $output)) {
				$data = $output['data'];
				$output = view($output['blade'], compact('data'));
			}
			return $output;
		}
		else {
			echo $response;
		}
	}

}
