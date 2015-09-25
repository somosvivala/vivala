<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;
use App\PrettyUrl;
use Auth;

class CriarOngRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		Validator::extend('pretty_url', function($attribute, $value, $parameters)
		{
			$prettyUrl = PrettyUrl::where("url", $value)->get()->first();
			$isMyUrl = $prettyUrl ? ($prettyUrl->prettyurlable == Auth::user()->entidadeAtiva) : true;
		    return ($prettyUrl ? $isMyUrl : true);
		});

		return [
			'nome' 					=> "string|required|min:2",
			'apelido' 				=> "string|required|min:2",
			'descricao' 			=> "string|required|min:2",
			'horario_funcionamento' => "string|required|min:2",
			'local' 				=> "string|required|min:2",
			"url"  					=> "required|alpha_dash|min:2|pretty_url"			
		];
	}

}