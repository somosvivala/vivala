<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SelecionarPoltronasClickbusRequest extends Request {

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
            $rules = [
                'nome' => 'array|required'
            ];

            /**
             * O metodo rules só precisa retornar um array, o laravel aceita 
             * essa notacao com . ou seja para um input inputname[] é possivel 
             * acessar inputname[1] atraves de 'inputname.1'
             */

            //iterando sob todos os campos nome para entao settar a regra de validacao
            foreach ($this->request->get('nome') as $key => $val) 
            {
                $rules['nome.'.$key] = 'alpha|required|min:3';
            }

            //iterando sob todos os campos documento para entao settar a regra de validacao
            foreach ($this->request->get('documento') as $key => $val) 
            {
                $rules['documento.'.$key] =  'numeric|required';
            }

            return $rules;
	}

}
