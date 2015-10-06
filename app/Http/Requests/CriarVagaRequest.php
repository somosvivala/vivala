<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Route;

class CriarVagaRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		//Auth::user()->entidadeAtiva->podeEditar; @TODO criar verificacao para editar a vaga
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
			"habilidades" 			=> "string|required|min:2",
			"sobre_trabalho" 		=> "string|required|min:2",
			'logradouro'			=> "string|required|min:2",
			'cep'					=> "integer|required|min:2",
			'bairro'				=> "string|required|min:2",
			'complemento'			=> "string|required|min:2",
			'estado'				=> "string|required|min:2",
			'cidade'				=> "string|required|min:2",
			'quantidade_vagas'		=> "integer|required|min:1"
		];
	}

}
