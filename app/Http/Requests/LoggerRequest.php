<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Config;

class LoggerRequest extends Request {

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
      //checando se existe algum valor mapeado para esse tipo
      $tipo = Config::get('logger.' . Request::get('tipo'));
      if (isset($tipo)) {
          Request::merge(['tipo' => $tipo]);
      }

      //checando se existe algum valor mapeado para essa descricao
      $descricao  = Config::get('logger.' . Request::get('descricao'));
      if (isset($descricao)) {
          Request::merge(['descricao' => $descricao]);
      }

      return [
          'tipo' => 'string|required',
          'descricao' => 'string|required',
          'url' => 'string',
          'extra' => 'string'
      ];
	}

}
