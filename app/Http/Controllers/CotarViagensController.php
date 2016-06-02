<?php namespace App\Http\Controllers;

use App;
use Auth;
use Input;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CotarViagensRequest;
use App\Events\NovaCotacaoViagem;

class CotarViagensController extends Controller {

	public function getForm(CotarViagensRequest $request)
	{
		//dd(json_encode($request->all()));

		// Montando objeto USUÁRIO
		$user = [
			'user-id' => Auth::user()->id,
			'user-username' => Auth::user()->perfil->nome_completo,
			'user-email' => Auth::user()->email
		];

		$cotacao_obj = [
			'basico' => [
				'cotacao' => Input::get('basico-cotacao'),
				'origem' => Input::get('basico-origem-1'),
				'destino' => Input::get('basico-destino-1'),
				'data-ida' => Input::get('basico-data-ida-1'),
				'data-volta' => Input::get('basico-data-volta-1'),
				'datas-flexiveis' => Input::get('basico-datas-flexiveis'),
				'numero-adultos' => Input::get('basico-nro-adultos'),
				'numero-criancas' => Input::get('basico-nro-criancas'),
				'idade-criancas' => Input::get('basico-idade-criancas'),
				'pref-tempo' => Input::get('basico-pref-tempo-viagem'),
				'horario-restrito' => Input::get('basico-horario-restrito'),
				'qto-gastar' => Input::get('basico-qto-gastar-viagem')
			],
			'hospedagem' => [
				'nro-quartos' => Input::get('hospedagem-nro-quartos'),
				'adicionais-hotel' => Input::get('hospedagem-adicionais'),
				'bairro-regiao-pref' => Input::get('hospedagem-bairro-regiao-preferencia'),
				'infos-adicionais' => Input::get('hospedagem-informacoes-adicionais')
			],
			'alimentacao' => [
				'tipo-refeicao' => Input::get('alimentacao-tipo-refeicao'),
				'opcao-cozinha' => Input::get('alimentacao-opcao-cozinha'),
				'preco-medio-prato' => Input::get('alimentacao-preco-medio-por-prato')

			],
			'carros' => [
				'categoria' => Input::get('carros-categorias'),
				'adicionais' => Input::get('carro-adicionais')
			]
		];

		$CotacaoViagem = [
			'usuario' => $user,
			'cotacao_obj' => $cotacao_obj
		];

		//Disparando evento para avisando que temos uma nova cotação
		event(new NovaCotacaoViagem($CotacaoViagem));

		// Retorno da request JSON para mensagem de sucesso
		return($request->all());
	}

}
