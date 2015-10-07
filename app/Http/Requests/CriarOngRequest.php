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
			'descricao' 			=> "string|required|min:2",
			'horario_funcionamento' => "string|required|min:2",
			'url'  					=> "required|alpha_dash|min:2|pretty_url",
			'logradouro'			=> "string|required|min:2",
			'cep'					=> "integer|required|min:2",
			'bairro'				=> "string|required|min:2",
			'complemento'			=> "string|min:2",
			'email_contato'			=> "email",
			'telefone_contato'			=> "string|min:8",
			'cidade_id'				=> "integer|min:2"			
		];
	}

}
