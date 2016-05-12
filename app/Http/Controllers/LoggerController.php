<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Config;

/**
 * Controller para receber informacoes que vamos registrar
 */
class LoggerController extends Controller {

    /**
     * Recebe por POST as informacoes referentes a essa acao que vai ser registrada
     *
     * @param $request - Uma instancia de LoggerRequest, para validar a presenca dos parametros
     */
    public function postLogaction(Request $request)
    {
        //pegando o tipo da acao, testando se existe algum valor associado a esse tipo
        $tipo = Config::get('logger.'.$request->strTipo);
        $tipo = isset($tipo) ? $tipo : $request->strTipo;

        //pegando a descricao da acao, testando se existe algum valor associado a essa descricao
        $descricao = Config::get('logger.'.$request->strDesc);
        $descricao = isset($descricao) ? $descricao : $request->strDesc;

        dd($tipo, $descricao);
        /*
        //disparando o evento avisando que ocorreu uma acao que queremos registrar
        event(new NovaInteracaoPlataforma(
            Auth::user()->entidadeAtiva,
            $tipo,
            $descricao,
            $request->strUrl,
            json_encode($request->strExtra)
            ));
         */
    }
}
