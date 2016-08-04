<?php namespace App\Interfaces;

/**
 * Criando uma interface para o repositorio de buscaCEP,
 * assim promovemos mantenabilidade programando para uma interface
 */
abstract class BuscaCEPRepositoryInterface {
    //Por enquanto nao temos nenhum metodo claro que deveria existir na interface
    //portanto deixamos ela limpa, ainda é melhor criar a interface, extende-la e fazer a
    //automatic name-resolution da dependency injection.
}
