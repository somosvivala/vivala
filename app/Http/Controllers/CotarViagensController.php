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

	public $mailSenderRepository;

	function __construct(MailSenderRepository $repository)
	{
			$this->mailSenderRepository = $repository;
	}

	public function getForm(CotarViagensRequest $request)
	{
		$input = Input::all();
		$user = Auth::user();

		$from = Input::get('basico-origem-1');
		$to = Input::get('basico-destino-1');
		$departure_date_1 = Input::get('basico-data-da-ida-1');
		$arrival_date_1 = Input::get('basico-data-da-volta-1');
		$accomodation_1 = Input::get('basico-mais-hospedagem-1');

		$flexible_dates = Input::get('basico-datas-flexiveis');
		$adults = Input::get('basico-nro-adultos');
		$children = Input::get('basico-nro-criancas');
		$time_morning = Input::get('basico-pref-tempo-manha');
		$time_noon = Input::get('basico-pref-tempo-tarde');
		$time_night = Input::get('basico-pref-tempo-noite');
		$time_dawn = Input::get('basico-pref-tempo-madrugada');
		$restrict_hours = Input::get('basico-horario-restrito');

		$acc_rooms = Input::get('hospedagem-nro-quartos');
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

		//Disparando evento para avisando que temos
		//uma nova cotação
		//event(new NovaCotacaoViagem($User, $Request));

		return dd($input);
	}

}
