<?php namespace App\Interfaces;

/**
 * Criando uma interface para o repositorio de logger,
 * assim promovemos mantenabilidade programando para uma interface
 */
abstract class LoggerRepositoryInterface {

    /**
     * Metodo que sera implementado pelos repositorios que o extenderem
     */
    protected abstract function saveLog();

}
