<?php namespace App\Repositories;

use App\Interfaces\LocaisRepositoryInterface;
use App\Cidade;

/**
 * Classe que implementa LocaisRepositoryInterface, responsavel
 * pelas acoes referentes a localizacoes (cidades, estados, etc..)
 */
class LocaisRepository extends LocaisRepositoryInterface
{
    /**
     * Metodo para retornar as opcoes do autocomplete de cidades
     *
     * @param $query - a query de busca que vai ser usada para encontrar cidades
     * @return Collection com as possiveis cidades que satisfazem a query
     */
    public function getCidadesByQuery($query, $limit=10)
    {
        $result = Cidade::whereRaw("lower(nome) LIKE lower('%{$query}%')")
            ->limit($limit)
            ->get();

        return $result;
    }
}
