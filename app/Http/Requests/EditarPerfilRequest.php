<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Validator;
use App\PrettyUrl;
use Auth;

class EditarPerfilRequest extends Request {

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
			"apelido" 				=> "required|min:2",
			"url"  					=> "required|alpha_dash|min:2|pretty_url",
			"aniversario" 			        => 'required|date_format:"d/m/Y"',
                        "descricao_curta" 			=> 'string',
                        "descricao_longa" 			=> 'string',
			"cidade_atual" 			        => 'string|min:3'
		];
	}

}
							
