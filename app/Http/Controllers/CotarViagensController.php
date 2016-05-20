<?php namespace App\Http\Controllers;

use App;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CotarViagensRequest;
use Illuminate\Http\Request;
use Input;
use Auth;
use App\Events\NovaCotacaoViagem;
use App\Repositories\MailSenderRepository;

class CotarViagensController extends Controller {

	public function getForm(CotarViagensRequest $request)
	{
		// Dados do usuário
		$user = Auth::user();
		$user_id = $user->id;
		$user_username = $user->username;
		$user_email = $user->email;

		$opt_flight = intval(Input::get('basico-cotacao-voos'));
		if(isset($opt_flight) && $opt_flight) $opt_flight='NÃO COTAR'; else $opt_flight='COTAR';
		$opt_bus = intval(Input::get('basico-cotacao-onibus'));
		if(isset($opt_bus) && $opt_bus) $opt_bus='NÃO COTAR'; else $opt_bus='COTAR';
		$opt_accomodation = intval(Input::get('basico-cotacao-hospedagem'));
		if(isset($opt_accomodation) && $opt_accomodation) $opt_accomodation='NÃO COTAR'; else $opt_accomodation='COTAR';
		$opt_car = intval(Input::get('basico-cotacao-carros'));
		if(isset($opt_car) && $opt_car) $opt_car='NÃO COTAR'; else $opt_car='COTAR';
		$options = [
			'cotacao-voo' => $opt_flight,
			'cotacao-onibus' => $opt_bus,
			'cotacao-hospedagem' => $opt_accomodation,
			'cotacao-carro' => $opt_car,
		];

		$from = strtoupper(Input::get('basico-origem-1'));
		$to = strtoupper(Input::get('basico-destino-1'));
		$departure_date_1 = Input::get('basico-data-da-ida-1');
		$arrival_date_1 = Input::get('basico-data-da-volta-1');
		//$accomodation_1 = intval(Input::get('basico-mais-hospedagem-1'));

		$flexible_dates = Input::get('basico-datas-flexiveis');
		$adults = intval(Input::get('basico-nro-adultos'));
		$children = intval(Input::get('basico-nro-criancas'));
		$time_morning = intval(Input::get('basico-pref-tempo-manha'));
		$time_noon = intval(Input::get('basico-pref-tempo-tarde'));
		$time_night = intval(Input::get('basico-pref-tempo-noite'));
		$time_dawn = intval(Input::get('basico-pref-tempo-madrugada'));
		$restrict_hours = Input::get('basico-horario-restrito');

		$acc_rooms = intval(Input::get('hospedagem-nro-quartos'));
		$acc_adc_cafe = Input::get('hospedagem-adicional-cafe');
		$acc_adc_wifi = Input::get('hospedagem-adicional-wifi');
		$acc_adc_ar_cond = Input::get('hospedagem-adicional-ar-condicionado');
		$acc_adc_tv_cabo = Input::get('hospedagem-adicional-tv-cabo');
		$acc_adc_cancelamento = Input::get('hospedagem-adicional-cancelamento');
		$acc_adc_animal = Input::get('hospedagem-adicional-animal');
		$acc_adc_piscina = Input::get('hospedagem-adicional-piscina');
		$acc_adc_academia = Input::get('hospedagem-adicional-academia');
		$acc_adc_estacionamento = Input::get('hospedagem-adicional-estacionamento');
		$acc_adc_banheiro_privativo = Input::get('hospedagem-adicional-banheiro-privativo');
		$acc_adc_varanda = Input::get('hospedagem-adicional-varanda');
		$acc_adc_translado = Input::get('hospedagem-adicional-translado');
		$acc_pref_region = Input::get('hospedagem-bairro-regiao-preferencia');
		$acc_add_infos = Input::get('hospedagem-informacoes-adicionais');

		// MONTANDO O OBJETO
		$CotacaoViagem = [
			'user-id' => $user_id,
			'user-username' => $user_username,
			'user-email' => $user_email,
			'lugar-saida' => $from,
			'lugar-chegada' => $to,
			'data-ida' => $departure_date_1,
			'data-volta' => $arrival_date_1,
			'cotar' => $options,
			'numero-adultos' => $adults,
			'numero-criancas' => $children,
		];

		//Disparando evento para avisando que temos
		//uma nova cotação
		//event(new NovaCotacaoViagem($User, $Request));

		return dd($CotacaoViagem);
	}

}
