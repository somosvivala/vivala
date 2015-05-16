<?php namespace App\Http\Controllers;

use App\Configuracao;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

 class ConfiguracaoController extends Controller {

		
	public function index() {
		$configuracoes = Configuracao::all(); 
		return $configuracoes;
	}

	
	public function get($configuracao_nome) {
		$valor_configuracao = Configuracao::where('char_nome_configuracao', '=', $configuracao_nome)
			->firstOrFail()
			->text_valor_configuracao;

		return $valor_configuracao;
	}


}
