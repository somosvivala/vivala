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
			'habilidades' 			=> "string|required|min:2",
			'sobre_trabalho' 		=> "string|required|min:2",
                        'horario_funcionamento' => "string|required|min:2",
                        'logradouro'			=> "string|required|min:2",
			'cep'					=> "numeric|required|min:2",
			'bairro'				=> "numeric|required|min:2",
			'complemento'			=> "string|min:2",
			'cidade_id'				=> "numeric|min:2",
			'email_contato'				=> "email",
                        'telefone_contato'                      => "numeric|min:8",
                        'quantidade_vagas'		=> "numeric|required|min:1",
                        'numero_beneficiados'		=> "numeric"
                    ]
	}

}
