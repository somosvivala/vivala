<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContatoRequest extends Request {

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
                'nome'                          => "string|required|min:2",
                'email'				=> "email|required",
                'assunto'		        => "string|required|min:2",
                'mensagem'                      => "string|required|min:2"
                ];
	}

}
