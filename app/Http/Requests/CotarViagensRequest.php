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
				'basico-cotacao-voos' => 'boolean',
				'basico-cotacao-onibus' => 'boolean',
				'basico-cotacao-hospedagem' => 'boolean',
				'basico-cotacao-carros' => 'boolean',
				/* Viagem numero 1 [Obrigatória] */
				'basico-origem-1' => 'required|string|min:2',
				'basico-destino-1' => 'required|string|min:2',
				'basico-data-ida-1' => 'required|string|min:10',
				'basico-data-volta-1' => 'required|string|min:10',
				'basico-mais-hospedagem-1' => 'boolean',
				/* Viagem numero 2 a 5 [Não Obrigatória]
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
				'basico-pref-tempo-manha' => 'boolean',
				'basico-pref-tempo-tarde' => 'boolean',
				'basico-pref-tempo-noite' => 'boolean',
				'basico-pref-tempo-madrugada' => 'boolean',
				'basico-horario-restrito' => 'string',
			/* HOSPEDAGEM */
				'hospedagem-nro-quartos-do-hotel' => 'numeric',
				'hospedagem-adicional-cafe' => 'boolean',
				'hospedagem-adicional-wifi' => 'boolean',
				'hospedagem-adicional-ar-condicionado' => 'boolean',
				'hospedagem-adicional-tv-cabo' => 'boolean',
				'hospedagem-adicional-cancelamento' => 'boolean',
				'hospedagem-adicional-animal' => 'boolean',
				'hospedagem-adicional-piscina' => 'boolean',
				'hospedagem-adicional-academia' => 'boolean',
				'hospedagem-adicional-estacionamento' => 'boolean',
				'hospedagem-adicional-banheiro-privativo' => 'boolean',
				'hospedagem-adicional-banheiro-varanda' => 'boolean',
				'hospedagem-adicional-translado' => 'boolean',
				'hospedagem-bairro-regiao-preferencia' => 'string',
				'hospedagem-informacoes-adicionais' => 'string',
			/* CARROS */
		];
	}

}
