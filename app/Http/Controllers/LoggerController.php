<?php namespace App\Http\Controllers;

use App\Interfaces\LoggerRepositoryInterface;
use App\Http\Requests\LoggerRequest;
use App\Http\Controllers\Controller;
use App\Events\NovaInteracaoPlataforma;
use Illuminate\Http\Request;
use Config;
use Auth;

/**
 * Controller para receber informacoes que vamos registrar
 */
class LoggerController extends Controller
{

    //Instancia de LoggerRepository
    private $logger;

    /**
     * Constructor do controller, constroi o objeto ja com suas dependencias
     *
     * @param LoggerRepositoryInterface - Inserindo dependencia
     * na classe, assim o laravel vai servir uma instancia
     * de LoggerRepository no lugar da interface
     */
    public function __construct(LoggerRepositoryInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Rota para servir os ultimos logs
     */
    public function getUltimoslogs()
    {
        //usando da instancia de logger para recuperar os logs
        $Logs = $this->logger->getUltimosLogs();
        return [
            'html' =>view('gestao._listalogs', compact('Logs'))->render()
        ];
    }


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
