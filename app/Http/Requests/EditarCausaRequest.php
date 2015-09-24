<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Route;

class EditarCausaRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		//Auth::user()->entidadeAtiva->podeEditar; @TODO criar verificacao para editar a causa
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
			"local" 				=> "string|required|min:2"
		];
	}

}
