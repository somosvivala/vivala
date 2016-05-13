<?php namespace App\Http\Controllers;

use App\Http\Requests\LoggerRequest;
use App\Http\Controllers\Controller;
use App\Events\NovaInteracaoPlataforma;
use Illuminate\Http\Request;
use Config;
use Auth;

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
        $user = Auth::user();

        //disparando o evento avisando que ocorreu uma acao que queremos registrar
        event(new NovaInteracaoPlataforma(
            //checando se existe alguem logado, pois pode ser um evento deslogado
            isset($user) ? $user->entidadeAtiva : null,
            $request->tipo,
            $request->descricao,
            $request->url,
            isset($request->extra) ? json_encode($request->extra) : null
            ));
    }
}
