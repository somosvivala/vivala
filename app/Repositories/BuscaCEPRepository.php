<?php namespace App\Repositories;

/**
 * Repositorio para buscar CEP online
 */
class BuscaCEPRepository
{
    public $URL = 'https://viacep.com.br/ws/';
    public $FLAG_RETORNO_JSON = '/json';

    /**
     * Metodo para retornar os detalhes de um CEP
     */
    public function getCEP($cep)
    {
        //montando requisicao
        $context = [
            'http' => [
                'ignore_errors' => true,
                'method' => 'GET',
                ],
        ];

        //fazendo a requisicao de fato
        $context = stream_context_create($context);
        $result = file_get_contents($this->URL.$cep.$this->FLAG_RETORNO_JSON, false, $context);

        //Testando o retorno para saber se deu erro
        $deuErro = preg_match('/Bad Request/', $result);

        return $deuErro ? false : json_decode($result);
    }

}
