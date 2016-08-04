<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class GerarBoletoInscricaoExperienciaRequest extends Request {

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
       'experiencia_id' => 'required|exists:experiencias,id',
       'cpf' => 'string|required',
       'endereco_cep' => 'string|required',
       'endereco_localidade' => 'string|required',
       'endereco_uf' => 'string|required',
       'endereco_logradouro' => 'string|required',
       'endereco_bairro' => 'string|required',
		];
	}

}
