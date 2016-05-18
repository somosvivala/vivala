<?php

namespace app\Repositories;

use App\Interfaces\ExperienciasRepositoryInterface;
use App\Experiencia;
use App\User;
use App\CategoriaExperiencia;

/**
 * Repositorio para centralizar a lógica interna referente as Experiencias
 */
class ExperienciasRepository extends ExperienciasRepositoryInterface
{

    /*
     * Metodo para pegar todas as experiencia
     */
    public function getAll()
    {
        return Experiencia::all();
    }


    /*
     * Metodo para retornar a experiencia de $id
     *
     * @param $id - id da experiencia
     * @return Experiencia || null
     */
    public function find($id)
    {
        return Experiencia::find($id);
    }

    /*
     * Metodo para retornar a experiencia de $id ou falhar
     *
     * @param $id - id da experiencia
     * @return Experiencia
     */
    public function findOrFail($id)
    {
        return Experiencia::findOrFail($id);
    }

    /**
     * Metodo para criar uma nova experiencia
     */
    public function create($arrayArgumentos)
    {
        return Experiencia::create($arrayArgumentos);
    }

    /**
     * Metodo para criar uma nova experiencia e ja associar a algumas categorias
     */
    public function createComCategorias($arrayArgumentos)
    {
        //criando a experiencia normalmente
        $experiencia = $this->create($arrayArgumentos);

        $categorias = $arrayArgumentos['categoria'];

        //iterando sob as categorias e salvando-as a experiencia
        foreach ($categorias as $categoriaId)
        {
            $categoria = CategoriaExperiencia::findOrFail($categoriaId);
            $experiencia->categorias()->save($categoria);
        }

        $experiencia->push();
        return $experiencia;
    }

    /**
     * Metodo usado para servir as experiencias para as view que precisem delas
     * ps: Bindar views que precisarem bindado em ExperienciasProvider
     *
     * @param $view - View que vai receber as experiencias
     *
     */
    public function injectAllExperiencias($view)
    {
        $Experiencias = $this->getAll();
        return $view->with('Experiencias', $Experiencias);
    }

    /**
     * Metodo para determinar se o usuario atualmente logado
     * tem permissao para editar essa experiencia
     *
     * @param $user - Uma instancia do usuario que queremos testar a permissao
     * @param $experienciaID - o id da experiencia que vamos testar
     */
    public function checaUsuarioPodeEditar(User $user, $experienciaID)
    {
        $experiencia = $this->findOrFail($experienciaID);

        //Se a entidadeAtiva for a ong criadora da experiencia
        $podeEditar = ($experiencia->owner == $user->entidadeAtiva);

        //ou se o usuario ativo for um admin
        $podeEditar = $podeEditar || $user->isAdmin();

        return $podeEditar;
    }

    /**
     * Metodo para determinar se um usuario tem permissao para criar uma experiencia
     *
     * @param $user - Uma instancia do usuario que queremos testar a permissao
     */
    public function checaUsuarioPodeCriar(User $user)
    {

        //desabilitado ate que ongs possam criar experiencias
        // $podeEditar = $user->entidadeAtiva->isOng; 

        //ou se o usuario ativo for um admin
        $podeEditar = false || $user->isAdmin();

        return $podeEditar;
    }


}
