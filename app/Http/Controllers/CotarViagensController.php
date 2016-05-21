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

	public function setOpcaoCotacao($opt)
	{
		if(isset($opt) && $opt) $opt='COTAR'; else $opt='NÃO COTAR';
		return $opt;
	}

	public function setOpcaoTempo($time)
	{
		if(isset($time) && $time) $time='PODE VIAJAR'; else $time='NÃO PODE VIAJAR';
		return $time;
	}

	public function setDatasHorariosRestritos($val)
	{
		if(isset($val) && $val) $val='POSSUI'; else $val='NÃO POSSUI';
		return $val;
	}

	public function setOpcaoAdicional($add)
	{
		if(isset($add) && $add) $add='SIM'; else $add='NÃO';
		return $add;
	}

	public function getForm(CotarViagensRequest $request)
	{
		// Montando objeto USUÁRIO
		$user = [
			'user-id' => Auth::user()->id,
			'user-username' => Auth::user()->username,
			'user-email' => Auth::user()->email
		];

		// Montando objeto de OPÇÕES DE COTAÇÃO
		$options = [
			'cotacao-voo' => $this->setOpcaoCotacao(intval(Input::get('basico-cotacao-voos'))),
			'cotacao-onibus' => $this->setOpcaoCotacao(intval(Input::get('basico-cotacao-onibus'))),
			'cotacao-hospedagem' => $this->setOpcaoCotacao(intval(Input::get('basico-cotacao-hospedagem'))),
			'cotacao-carro' => $this->setOpcaoCotacao(intval(Input::get('basico-cotacao-carros'))),
		];

		// Montando objeto de seleção de TEMPO DE VIAGEM
		$time = [
			'viaja-manha' => $this->setOpcaoTempo(intval(Input::get('basico-pref-tempo-manha'))),
			'viaja-tarde' => $this->setOpcaoTempo(intval(Input::get('basico-pref-tempo-tarde'))),
			'viaja-noite' => $this->setOpcaoTempo(intval(Input::get('basico-pref-tempo-noite'))),
			'viaja-madrugada' => $this->setOpcaoTempo(intval(Input::get('basico-pref-tempo-madrugada'))),
			'horario-restrito' => Input::get('basico-horario-restrito')
		];

		// Montando objeto da VIAGEM BÁSICA
		$basics = [
			'lugar-saida' => strtoupper(Input::get('basico-origem-1')),
			'lugar-chegada' => strtoupper(Input::get('basico-destino-1')),
			'data-ida' => Input::get('basico-data-ida-1'),
			'data-volta' => Input::get('basico-data-volta-1'),
			'datas-flexiveis' => $this->setDatasHorariosRestritos(intval(Input::get('basico-datas-flexiveis'))),
			'numero-adultos' => intval(Input::get('basico-nro-adultos')),
			'numero-criancas' => intval(Input::get('basico-nro-criancas'))
		];

		// Montando o objeto de adicionais da HOSPEDAGEM
		$accomodation_additionals = [
			'adicional-cafe' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-cafe'))),
			'adicional-wifi' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-wifi'))),
			'adicional-ar-condicionado' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-ar-condicionado'))),
			'adicional-tv-cabo' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-tv-cabo'))),
			'adicional-cancelamento' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-cancelamento'))),
			'adicional-animal' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-animal'))),
			'adicional-piscina' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-piscina'))),
			'adicional-academia' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-academia'))),
			'adicional-estacionamento' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-estacionamento'))),
			'adicional-banheiro-privativo' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-banheiro-privativo'))),
			'adicional-varanda' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-varanda'))),
			'adicional-translado' => $this->setOpcaoAdicional(intval(Input::get('hospedagem-adicional-translado'))),
		];

		// Montando o OBJETO final da HOSPEDAGEM
		$accomodation = [
			'hotel-numero-quartos' => intval(Input::get('hospedagem-nro-quartos')),
			'hotel-adicionais' => $accomodation_additionals,
			'hotel-bairro-regiao' => Input::get('hospedagem-bairro-regiao-preferencia'),
			'hotel-infos-adicionais' => Input::get('hospedagem-informacoes-adicionais')
		];

		// MONTANDO O OBJETO FINAL para o EVENTO
		$CotacaoViagem = new \stdClass();
		$CotacaoViagem->usuario = $user;
		$CotacaoViagem->opcoes = $options;
		$CotacaoViagem->dados = $basics;
		$CotacaoViagem->tempo = $time;
		$CotacaoViagem->hospedagem = $accomodation;

		//Disparando evento para avisando que temos uma nova cotação
		event(new NovaCotacaoViagem($CotacaoViagem));
	}

}
