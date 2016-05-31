<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CotarViagensRequest extends Request {

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
			/* BÁSICO */
				'basico-cotacao' => 'array',
				/* Viagem numero 1 [OBRIGATÓRIOS] */
				'basico-origem-1' => 'required|string|min:2',
				'basico-destino-1' => 'required|string|min:2',
				'basico-data-ida-1' => 'required|string|min:10',
				'basico-data-volta-1' => 'string|min:10',
				'basico-mais-hospedagem-1' => 'boolean',
				/* Viagem numero 2 a 5 [NÃO OBRIGATÓRIO]
					'basico-origem-2' => 'string|min:2',
					'basico-destino-2' => 'string|min:2',
					'basico-data-ida-2' => 'string|min:10',
					'basico-data-volta-2' => 'string|min:10',
					'basico-mais-hospedagem-2' => '',
					'basico-origem-2' => 'string|min:2',
					'basico-destino-2' => 'string|min:2',
					'basico-data-ida-2' => 'string|min:10',
					'basico-data-volta-2' => 'string|min:10',
					'basico-mais-hospedagem-2' => '',
					'basico-origem-3' => 'string|min:2',
					'basico-destino-3' => 'string|min:2',
					'basico-data-ida-3' => 'string|min:10',
					'basico-data-volta-3' => 'string|min:10',
					'basico-mais-hospedagem-3' => '',
					'basico-origem-4' => 'string|min:2',
					'basico-destino-4' => 'string|min:2',
					'basico-data-ida-4' => 'string|min:10',
					'basico-data-volta-4' => 'string|min:10',
					'basico-mais-hospedagem-4' => '',
					'basico-origem-5' => 'string|min:2',
					'basico-destino-5' => 'string|min:2',
					'basico-data-ida-5' => 'string|min:10',
					'basico-data-volta-5' => 'string|min:10',
					'basico-mais-hospedagem-5' => '',
					*/
				//
				'basico-datas-flexiveis' => 'boolean',
				'basico-nro-adultos' => 'required|string',
				'basico-nro-criancas' => 'required|string',
				'basico-pref-tempo-viagem' => 'array',
				'basico-horario-restrito' => 'string',
				'basico-qto-gastar-viagem' => 'numeric',
			/* HOSPEDAGEM [OPCIONAL] */
				'hospedagem-nro-quartos-do-hotel' => 'numeric',
				'hospedagem-adicionais' => 'array',
				'hospedagem-bairro-regiao-preferencia' => 'string',
				'hospedagem-informacoes-adicionais' => 'string',
			/* ALIMENTAÇÃO */
			/* CARROS */
		];
	}

}
