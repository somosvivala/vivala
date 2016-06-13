<?php

namespace app\Repositories;

use App\Interfaces\ExperienciasRepositoryInterface;
use App\Experiencia;
use App\User;
use App\CategoriaExperiencia;
use App\Cidade;
use App\Ong;
use App\InformacaoExperiencia;
use App\DataOcorrenciaExperiencia;
use Carbon\Carbon;

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

        //checando se existe alguma informacaoExtra nessa experiencia
        $informacaoExtra = array_key_exists('informacao-extra', $arrayArgumentos) ? $arrayArgumentos['informacao-extra'] : [];

        //iterando sob as informacoes
        foreach ($informacaoExtra as $informacao)
        {
            //encontrando a informacao no bd e fazendo update da informacao
            $infoObj = InformacaoExperiencia::find($informacao['id']);
            $infoObj->update([
                'descricao' => $informacao['descricao_info'],
                'icone' => $informacao['icone']
            ]);

            //associando/re-associando a informacao na experiencia
            $experiencia->informacoes()->save($infoObj);
        }

        //checando se existe alguma dataOcorrencia nessa experiencia
        $dataOcorreciaArray = array_key_exists('datas-ocorrencia', $arrayArgumentos) ? $arrayArgumentos['datas-ocorrencia'] : [];

        //iterando sob as datas
        foreach ($dataOcorreciaArray as $dataOcorrencia)
        {
            //encontrando a dataOcorrencia no bd e fazendo update da dataOcorrencia
            $dataObj = DataOcorrenciaExperiencia::find($dataOcorrencia['id']);
            $dataObj->update([
                'data_ocorrencia' => Carbon::createFromFormat('d/m/Y',$dataOcorrencia['data'])
            ]);

            //associando/re-associando a dataOcorrencia na experiencia
            $experiencia->ocorrencias()->save($dataObj);
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

        //checando se existe alguma informacaoExtra nessa experiencia
        $informacaoExtra = array_key_exists('informacao-extra', $arrayArgumentos) ? $arrayArgumentos['informacao-extra'] : [];

        //iterando sob as informacoes
        foreach ($informacaoExtra as $informacao)
        {
            //encontrando a informacao no bd e fazendo update da informacao
            $infoObj = InformacaoExperiencia::find($informacao['id']);
            $infoObj->update([
                'descricao' => $informacao['descricao_info'],
                'icone' => $informacao['icone']
            ]);

            //associando/re-associando a informacao na experiencia
            $experiencia->informacoes()->save($infoObj);
        }

        //checando se existe alguma dataOcorrencia nessa experiencia
        $dataOcorreciaArray = array_key_exists('datas-ocorrencia', $arrayArgumentos) ? $arrayArgumentos['datas-ocorrencia'] : [];

        //iterando sob as datas
        foreach ($dataOcorreciaArray as $dataOcorrencia)
        {
            //encontrando a dataOcorrencia no bd e fazendo update da dataOcorrencia
            $dataObj = DataOcorrenciaExperiencia::find($dataOcorrencia['id']);
            $dataObj->update([
                'data_ocorrencia' => Carbon::createFromFormat('d/m/Y',$dataOcorrencia['data'])
            ]);

            //associando/re-associando a dataOcorrencia na experiencia
            $experiencia->ocorrencias()->save($dataObj);
        }

        return $experiencia->push();

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


    /**
     * Metodo para criar novas InformacaoExperiencia
     *
     * @param $arrayArgumentos - array contendo os valores das colunas de InformacaoExperiencia
     * @return App\InformacaoExperiencia
     */
    public function createInformacaoExtra($arrayArgumentos = [])
    {
        $infoExp = InformacaoExperiencia::create($arrayArgumentos);

        //por algum motivo o create nao esta retornando uma instancia full loaded, por isso estou pegando denovo
        return InformacaoExperiencia::find($infoExp->id);
    }


    /**
     * Metodo para deletar uma InformacaoExperiencia
     *
     * @param $id - id da InformacaoExperiencia a ser deletada
     * @return boolean - se deletou ou nao
     */
    public function deleteInformacaoExtra($arrayArgumentos)
    {
        return InformacaoExperiencia::findOrFail($arrayArgumentos['id'])->delete();
    }


    /**
     * Metodo para criar novas DataOcorrenciaExperiencia
     *
     * @param $arrayArgumentos - array contendo os valores das colunas de DataOcorrenciaExperiencia
     * @return App\DataOcorrenciaExperiencia
     */
    public function createDataOcorrencia($arrayArgumentos = [])
    {
        $dataOcorrencia = DataOcorrenciaExperiencia::create($arrayArgumentos);

        //por algum motivo o create nao esta retornando uma instancia full loaded, por isso estou pegando denovo
        return DataOcorrenciaExperiencia::find($dataOcorrencia->id);
    }


    /**
     * Metodo para deletar uma DataOcorrenciaExperiencia
     *
     * @param $id - id da DataOcorrenciaExperiencia a ser deletada
     * @return boolean - se deletou ou nao
     */
    public function deleteDataOcorrencia($arrayArgumentos)
    {
        return DataOcorrenciaExperiencia::findOrFail($arrayArgumentos['id'])->delete();
    }


    /**
      * Metodo para deletar uma Experiencia
      * @param $id da Experiencia
     */
    public function delete($id)
    {
        return $this->findOrFail($id)->delete();
    }



}
