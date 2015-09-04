<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuizConteMaisRequest extends Request {

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
		return [
			"apelido" 				=> "string|max:20",
		    "cidade_natal" 			=> "string|max:20",
		    "cidade_atual" 			=> "string|max:20",
		    "descricao_curta" 		=> "string|max:255",
		    "descricao_longa" 		=> "string"
		];
	}

}
