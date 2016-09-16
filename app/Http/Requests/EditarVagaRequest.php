<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Route;

class EditarVagaRequest extends Request {

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
			'ong' => "exists:ongs,id|required",
			'habilidades' 			=> "string|required|min:2",
			'sobre_trabalho' 		=> "string|required|min:2",
			'horario_funcionamento' => "string|required|min:2",
			'logradouro'			=> "string|required|min:2",
			'cep'					=> "required|min:2",
			'bairro'				=> "string|required|min:2",
			'complemento'			=> "string|min:2",
			'cidade_id'				=> "required|exists:cidades,id",
			'categoria_vaga_id'			=> "required|exists:categoria_vagas,id",
			'email_contato'				=> "email",
			'telefone_contato'                      => "min:8",
			'quantidade_vagas'		=> "numeric|required|min:1",
			'numero_beneficiados'		=> "numeric"
    ];
	}

}
