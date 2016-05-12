<?php namespace App\Http\Controllers;

use App\Http\Requests\LoggerRequest;
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
     * @param $request - Uma instancia de LoggerRequest, para garantir que os
     * parametros ja estejam de uma determinada forma
     */
    public function postLogaction(LoggerRequest $request)
    {
        //disparando o evento avisando que ocorreu uma acao que queremos registrar
        event(new NovaInteracaoPlataforma(
            Auth::user()->entidadeAtiva,
            $request-tipo,
            $request->descricao,
            $request->url,
            isset($request->extra) ? json_encode($request->extra) : null
            ));
    }
}
