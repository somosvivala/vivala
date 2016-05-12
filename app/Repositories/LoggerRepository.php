<?php namespace App\Repositories;

use App\Interfaces\LoggerRepositoryInterface;
use App\InteracaoPlataforma;

/**
 * Classe que implementa LoggerRepositoryInterface, responsavel
 * pelas acoes referentes as acoes trackeaveis na plataforma.
 */
class LoggerRepository extends LoggerRepositoryInterface
{

    /**
     * Metodo para criar e persistir o Log de uma acao
     * realizada na plataforma.
     *
     * @param $logObj - stdClass com as propriedades ja settadas
     * para criar uma instancia de InteracaoPlataforma
     */
    public function saveLog($logObj)
    {
        //criando uma nova acao na plataforma
        $novaAcao = InteracaoPlataforma::create((array)$logObj);

        //Se tiver vindo algum author, entao vamos associa-lo a nova acao criada
        if (isset($logObj->author)) {
            $novaAcao->author()->associate($logObj->author);
            $novaAcao->push();
        }
    }
}
