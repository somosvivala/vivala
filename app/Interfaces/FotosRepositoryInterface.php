<?php namespace App\Interfaces;

use App\Foto;

/**
 * Criando uma interface para o repositorio de fotos,
 * assim promovemos mantenabilidade programando para uma interface
 */
abstract class FotosRepositoryInterface {
    //Por enquanto nao temos nenhum metodo claro que deveria existir na interface
    //portanto deixamos ela limpa, ainda é melhor criar a interface, extende-la e fazer a
    //automatic name-resolution da dependency injection.
    //
    //Fazendo isso, podemos futuramente reimplementar toda a lógica das experiencias e substituir
    //o binding no AppServiceProvider que vai funcionar.
}
