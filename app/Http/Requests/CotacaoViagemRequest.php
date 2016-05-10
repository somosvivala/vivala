<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CotacaoViagemRequest extends Request {

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
			'cotacao-voos' => '',
			'cotacao-onibus' => '',
			'cotacao-hospedagem' => '',
			'cotacao-carros' => '',
			//
			/* Viagem numero 1*/
			'origem-1' => 'string|required|min:2',
			'destino-1' => 'string|required|min:2',
			'data-ida-1' => 'string|required|min:10',
			'data-volta-1' => 'string|required|min:10',
			'mais-hospedagem-1' => '',
			//
			'datas-flexiveis' => '',
			'nro-adultos' => 'numeric|required|min:1',
			'nro-criancas' => 'numeric|required|min:1',
			'pref-tempo-manha' => 'boolean',
			'pref-tempo-tarde' => 'boolean',
			'pref-tempo-noite' => 'boolean',
			'pref-tempo-madrugada' => 'boolean',
			'horarios-restritos' => '',
			/* Hospedagem somente */
			'nro-quartos-do-hotel' => '',
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
			'hospedagem-adicional-banheiro-translado' => 'boolean',
			'hospedagem-bairro-regiao-preferencia' => 'boolean',
			'hospedagem-adicional' => 'boolean',
		];
	}

}
