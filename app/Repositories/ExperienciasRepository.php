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
use App\InscricaoExperiencia;
use App\Foto;
use App\Interfaces\BoletoCloudRepositoryInterface;

use App\Events\Experiencias\ExperienciaPublicada;
use App\Events\Experiencias\ExperienciaDesativada;
use App\Events\Experiencias\ExperienciaRemovida;
use App\Events\Experiencias\InscricaoExperienciaConfirmada;
use App\Events\Experiencias\InscricaoExperienciaCancelada;

/**
 * Repositorio para centralizar a lógica interna referente as Experiencias
 */
class ExperienciasRepository extends ExperienciasRepositoryInterface
{
    /**
     * Settando propriedades que serao settadas no controller para torna-las dinamicas
     */
    public $repositorioBoletos;

    /**
     * Construtor que pega os valores do env.
     */
    function __construct(BoletoCloudRepositoryInterface $boletoRepo)
    {
        $this->repositorioBoletos = $boletoRepo;
    }

    /*
     * Metodo para pegar todas as experiencias
     */
    public function getAll()
    {
        return Experiencia::all();
    }

    /*
     * Metodo para pegar todas as experiencias
     */
    public function getExperienciasAtivas()
    {
        return Experiencia::publicadas()->get();
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
    public function find($id, $withTrashed=false)
    {
        if($withTrashed) {
            return Experiencia::withTrashed()->findOrFail($id);
        }

        return Experiencia::find($id);
    }

    /*
     * Metodo para retornar a experiencia de $id ou falhar
     *
     * @param $id - id da experiencia
     * @return Experiencia
     */
    public function findOrFail($id, $withTrashed=false)
    {
        if($withTrashed) {
            return Experiencia::withTrashed()->findOrFail($id);
        }

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

        //checando se existe alguma foto para a capa dessa experiencia
        $existeFotoCapa = array_key_exists('experiencia-foto-id', $arrayArgumentos) && $arrayArgumentos['experiencia-foto-id'];
        if ($existeFotoCapa) {
            $fotoCapa = Foto::findOrFail($arrayArgumentos['experiencia-foto-id']);
            $this->atualizaFotoCapa($experiencia, $fotoCapa);
        }

        //checando se existe alguma foto para a capa dessa experiencia
        $existeFotoOwner = array_key_exists('owner-experiencia-foto-id', $arrayArgumentos) && $arrayArgumentos['owner-experiencia-foto-id'];
        if ($existeFotoOwner) {
            $fotoOwner = Foto::findOrFail($arrayArgumentos['owner-experiencia-foto-id']);
            $this->atualizaFotoOwner($experiencia, $fotoOwner);
        }


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

        //Checando se existe de fato um indice de categorias
        if ( array_key_exists('categoria', $arrayArgumentos) ) {
            $experiencia->categorias()->sync($arrayArgumentos['categoria']);
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
        // Chama o Evento de Experiencia Removida
        event(new ExperienciaRemovida($this->findOrFail($id)));

        return $this->findOrFail($id)->delete();
    }

    /**
     * Metodo para criar novas inscricoesExperiencia
     *
     * @param $experienciaId - Id da experiencia que sera criada uma nova inscricao
     * @param $perfilId - Id do perfil que se inscreveu na experiencia
     */
    public function createInscricaoExperiencia($experienciaId, $perfilId, $dataInscricao=null)
    {
        $Experiencia = $this->findOrFail($experienciaId);

        //Se $dataInscricao nao vier null entao precisamos checar se
        //a experiencia ja possui uma data_ocorrencia para esse dia
        if ($dataInscricao) {

            //Se nao houver uma dataOcorrencia para esse dia criar uma
            if ($Experiencia->ocorrencias()->where('data_ocorrencia', $dataInscricao)->get()->isEmpty()) {
                $dataOcorrencia = $this->createDataOcorrencia([
                    'experiencia_id' => $Experiencia->id,
                    'data_ocorrencia' => $dataInscricao
                ]);
                $Experiencia->ocorrencias()->save($dataOcorrencia);
            }
        }

        //Se nao tiver vindo uma data de inscricao, entao é um evento tipo unico. com uma unica data possivel
        else {
            $dataInscricao = $dataInscricao ? $dataInscricao : $Experiencia->proximaOcorrencia->data_ocorrencia;
        }

        $inscricao = InscricaoExperiencia::create([
            'status' => 'pendente',
            'experiencia_id' => $experienciaId,
            'perfil_id' => $perfilId,
            'data_ocorrencia_experiencia' => $dataInscricao
        ]);

        return $inscricao;
    }

    /**
     * Metodo para confirmar uma inscricao de experiencia
     * @param $inscricao - a inscricao que devemos confirmar
     */
    public function confirmaInscricaoExperiencia($request)
    {
        $inscricao = InscricaoExperiencia::find($request->id_inscricao);
        $dataPagamento = Carbon::now();
        $dataExperienciaID = $inscricao->experiencia->proximaOcorrencia ? $inscricao->experiencia->proximaOcorrencia->id : null;

        $fezUpdate =  $inscricao->update([
            'status' => 'confirmada',
            'data_pagamento' => $dataPagamento,
            'data_ocorrencia_experiencia_id' => $dataExperienciaID
        ]);

        // Chama o Evento de Inscrição Confirmada
        event(new InscricaoExperienciaConfirmada($inscricao));

        return $fezUpdate;
    }

    /**
     * Metodo para cancelar uma inscricao de experiencia
     * @param $inscricao - a inscricao que devemos cancelar
     */
    public function cancelaInscricaoExperiencia($request)
    {
        $inscricao = InscricaoExperiencia::find($request->id_inscricao);
        $dataCancelamento = Carbon::now();

        $fezUpdate =  $inscricao->update([
            'status' => 'cancelada',
            'data_cancelamento' => $dataCancelamento
        ]);

        // Chama o Evento de Inscrição Cancelada
        event(new InscricaoExperienciaCancelada($inscricao));

        //Se a inscricao tem pagamento confirmado entao devemos retornar um feedback para o usuario
        if ($inscricao->temPagamentoConfirmado) {
            return [
                'status' => 'pendente'
            ];
        }

        return ['status' => $fezUpdate ? 'cancelada' : ''];
    }

    /**
      * Metodo para atualizar as inscricoes conforme ocorrer a Experiencia
      * pendentes -> expiradas && confirmadas -> concluidas
      * @param $experiencia -  Uma instancia de Experiencia
     */
    public function atualizaInscricoesExperiencia(Experiencia $experiencia)
    {
        $DataOcorrenciaExperiencia = $experiencia->proximaOcorrencia;
        $ocorrencia_id = $DataOcorrenciaExperiencia ? $DataOcorrenciaExperiencia->id : null;

        //atualizando inscricoes pendentes para expiradas
        $experiencia->inscricoes()->pendentes()->get()->each(function ($inscricaoPendente) {
            $inscricaoPendente->update(['status' => 'expirada']);
        });

        //atualizando inscricoes confirmadas para concluidas
        $experiencia->inscricoes()->confirmadas()->get()->each(function ($inscricaoPendente) use ($ocorrencia_id) {
            $inscricaoPendente->update([
                'status' => 'concluida',
                'data_ocorrencia_experiencia_id' => $ocorrencia_id
            ]);
        });

    }

    /**
     * Metodo para publicar uma experiencia (Passa a ficar disponivel na listagem e avisamos owner)
     * @param $request - PublicarExperienciaRequest
     */
    public function publicarExperiencia($request)
    {
        $experiencia = $this->findOrFail($request->id);
        $fezUpdate = $experiencia->update(['status' => 'publicada']);

        // Chama o Evento de Experiencia Publicada
        event(new ExperienciaPublicada($experiencia));
        return $fezUpdate;
    }

    /**
     * Metodo para desativar uma experiencia (Remover da listagem)
     * @param $request - DesativarExperienciaRequest
     */
    public function desativarExperiencia($request)
    {
        $experiencia = $this->findOrFail($request->id);
        $fezUpdate = $experiencia->update(['status' => 'analise']);

        // Chama o Evento de Experiencia Desativada
        event(new ExperienciaDesativada($experiencia));

        return $fezUpdate;
    }

    /**
     * Metodo para atualizar a foto de Capa da experiencia
     * @param $experiencia - Instancia da Experiencia que iremos atualizar a fotoCapa
     * @param $foto - nova foto a ser inserida como fotoCapa
     */
    public function atualizaFotoCapa(Experiencia $experiencia, Foto $foto)
    {
        $fotoCapa = $experiencia->fotoCapa;

        //Se tiver fotoCapa remover e entao settar uma nova
        if ($fotoCapa) {
            $fotoCapa->delete();
        }

        $experiencia->fotos()->save($foto);
        $experiencia->push();
    }

    /**
     * Metodo para atualizar a foto do Owner da experiencia
     * @param $experiencia - Instancia da Experiencia que iremos atualizar a fotoOwner
     * @param $foto - nova foto a ser inserida como fotoOwner
     */
    public function atualizaFotoOwner(Experiencia $experiencia, Foto $foto)
    {
        //settando o campo na foto que identifica que ela pertence ao owner da experiencia
        $foto->update(['foto_owner_experiencia' => true]);

        $fotoOwner = $experiencia->fotoOwner;
        //Se tiver fotoOwner remover e entao settar uma nova
        if ($fotoOwner) {
            $fotoOwner->delete();
        }

        //salvando em foto pois o ->fotoOwner é só um acessor com ->where('foto_owner_experiencia', true)
        $experiencia->fotos()->save($foto);
        $experiencia->push();
    }


    /**
     * Metodo para recuperar a inscricao de um Usuario em uma experiencia
     * @param $experiencia - Instancia de Experiencia
     * @param $perfil - Instancia de Perfil
     */
    public function getInscricaoUsuario(Experiencia $experiencia, User $user)
    {
        return $experiencia->inscricoes()->ativas()->where('perfil_id', $user->perfil->id)->first();
    }


    /**
     * Metodo para gerar um Boleto para uma Experiencia
     */
    public function gerarBoleto(Experiencia $experiencia, User $pagador)
    {
        return $this->repositorioBoletos->gerarBoleto($experiencia, $pagador);
    }


    /**
     * Metodo para retornar injetar os dias da semana no form de edit de experiencias
     */
    public function injectAllDiasDaSemana($view)
    {
        $arrayDias = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado', 'Domingo'];
        return $view->with('arrayDias', $arrayDias);
    }


    /**
     * Metodo para checar se o usuario pode cancelar a inscricao
     */
    public function userPodeCancelarInscricao($inscricao_id, User $user)
    {
        return InscricaoExperiencia::findOrFail($inscricao_id)->perfil->id == $user->perfil->id;
    }


    /**
     * Metodo para atualizar o status das inscricoes de confirmada para concluida
     */
    public function atualizaInscricoesConfirmadasParaConcluidas($inscricoes)
    {
        $inscricoes->each(function($Inscricao) {
            $Inscricao->update(['status' => 'concluida']);
            $Inscricao->push();
        });
    }

    /**
     * Metodo para atualizar o status das inscricoes de pendentes para expiradas
     */
    public function atualizaInscricoesPendentesParaExpiradas($inscricoes)
    {
        $inscricoes->each(function($Inscricao) {
            $Inscricao->update(['status' => 'expirada']);
            $Inscricao->push();
        });
    }



    /**
     * Metodo para atualizar o status de uma experiencia tipo evento_unico para finalizada
     */
    public function finalizaExperienciaEventoUnico(Experiencia $Experiencia)
    {
        $Experiencia->update(['status' => 'finalizada']);
        $Experiencia->push();
    }

    /**
     * Metodo para deletar as inscricoes canceladas de uma experiencia
     */
    public function deleteInscricaoExperiencia(InscricaoExperiencia $Inscricao) {
        return $Inscricao->delete();
    }


    /**
     * Metodo para injetar todas as experiencias ativas em uma View
     *
     */
    public function injectAllExperienciasAtivas($view)
    {
        $experiencias = $this->getExperienciasAtivas();
        return $view->with('experiencias', $experiencias);
    }




}
