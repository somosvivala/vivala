<?php

namespace app\Repositories;

use App\Interfaces\ExperienciasRepositoryInterface;
use App\Experiencia;
use App\User;
use App\CategoriaExperiencia;
use App\Cidade;
use App\Ong;

/**
 * Repositorio para centralizar a lógica interna referente as Experiencias
 */
class ExperienciasRepository extends ExperienciasRepositoryInterface
{

    /*
     * Metodo para pegar todas as experiencias
     */
    public function getAll()
    {
        return Experiencia::all();
    }

    /*
     * Metodo para pegar todas as categorias das experiencias
     */
    public function getAllCategorias()
    {
        return CategoriaExperiencia::all();
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
     *
     * @param $arrayArgumentos - Array com os argumentos que serao
     * passados para o Model::create
     */
    public function create($arrayArgumentos)
    {
        $experiencia = Experiencia::create($arrayArgumentos);

        //checando se existe alguma categoria nessa experiencia
        $categorias = array_key_exists('categoria', $arrayArgumentos) ? $arrayArgumentos['categoria'] : [];

        //iterando sob as categorias e salvando-as a experiencia
        foreach ($categorias as $categoriaId)
        {
            $categoria = CategoriaExperiencia::findOrFail($categoriaId);
            $experiencia->categorias()->save($categoria);
        }

        //pegando o id da cidade e associando a experiencia
        $cidade = Cidade::findOrFail($arrayArgumentos['cidade']);
        $experiencia->local()->associate($cidade);

        //pegando o id do owner e associando a experiencia
        $ong = Ong::findOrFail($arrayArgumentos['projeto']);
        $experiencia->owner()->associate($ong);

        $experiencia->push();
        return $experiencia;
    }

    /**
     * Metodo para fazer update de uma experiencia
     *
     * @param $arrayArgumentos - Ja validado e com os campos necessarios
     * @param $experienciaId - ID da experiencia que vai ser updated
     */
    public function update($arrayArgumentos, $experienciaId)
    {
        $experiencia =  $this->findOrFail($experienciaId);
        $cidade = Cidade::find($arrayArgumentos['cidade']);
        $ong = Ong::findOrFail($arrayArgumentos['projeto']);

        $experiencia->update($arrayArgumentos);
        $experiencia->local()->associate($cidade)->save();
        $experiencia->owner()->associate($ong)->save();
        $experiencia->categorias()->sync($arrayArgumentos['categoria']);
    }

    /**
     * Metodo usado para servir as experiencias para as view que precisem delas
     * ps: Bindar views que precisarem em ExperienciasProvider
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
     * Metodo usado para servir as categorias das experiencias para a view que precise delas
     * ps: Bindar views que precisarem em ExperienciasProvider
     *
     * @param $view - View que vai receber as categorias
     *
     */
    public function injectAllCategorias($view)
    {
        $Categorias = $this->getAllCategorias();
        return $view->with('Categorias', $Categorias);
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
