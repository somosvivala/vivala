<?php

namespace app\Repositories;

use App\Interfaces\ExperienciaRepositoryInterface;

/**
 * Repositorio para centralizar a lógica interna referente as Experiencias
 */
class ExperienciasRepository extends ExperienciaRepositoryInterface
{

    /*
     * Metodo para pegar todas as experiencia
     */
    public function getAll()
    {
        return Experiencia::all();
    }

    /**
     * Metodo usado para servir as experiencias para as view que precisem delas
     * ps: Bindar views que precisarem bindado em ExperienciasProvider
     *
     * @param $view - View que vai receber as experiencias
     *
     */
    public function getAllExperiencias($view)
    {
        $Experiencias = $this->ExperienciasRepository->getAll();
        return $view->with('Experiencias', $Experiencias);
    }


}
