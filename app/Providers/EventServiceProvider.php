<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Observers\GenericObserver;
use App\Vaga;
use App\Ong;
use App\CategoriaExperiencia;

class EventServiceProvider extends ServiceProvider
{

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'event.name' => [
            'EventListener',
        ],

        //Quando um perfil se voluntaria
        'App\Events\PerfilHasVolunteered' => [
            'App\Handlers\Events\SendMailsWhenPerfilHasVolunteered',
        ],

        /*
         * ClickBus
         */
        //Quando alguem finaliza uma compra da Clickbus
        'App\Events\ClickBusCompraFinalizada' => [
            'App\Handlers\Events\ClickBus\EnviaEmailCompraFinalizada',
        ],

        //Quando alguem finaliza uma compra da Clickbus
        'App\Events\ClickBusPassagemCancelada' => [
            'App\Handlers\Events\ClickBus\EnviaEmailPassagemCancelada',
            'App\Handlers\Events\ClickBus\UpdatePassagemCancelada',
        ],

        //Quando um pagamento da clickbus é confirmado
        'App\Events\ClickBusPagamentoConfirmado' => [
            'App\Handlers\Events\ClickBus\UpdatePagamentoConfirmado',
            'App\Handlers\Events\ClickBus\EnviaEmailPagamentoConfirmado',
        ],

        /*
         * CotacaoViagem
         */
        //Quando alguém finaliza a Cotação de uma Viagem
        'App\Events\NovaCotacaoViagem' => [
            'App\Handlers\Events\CotacaoViagem\EnviaEmailCotacaoViagem',
        ],

        /*
         * Logger
         */
        //Quando ocorrer alguma acao que sera guardada no log
        'App\Events\NovaInteracaoPlataforma' => [
            'App\Handlers\Events\Logger\CriarLogInteracaoPlataforma',
        ],

        /*
         * Experiencias - Todos os eventos relacionados a feature de Experiencias da plataforma
         */
        // Quando acontecer um booking deslogado, guardar na sesssao a pagina para sabermos se houve desistencia no cadastro
        // 'App\Events\BookouDeslogado' => [
        //     'App\Handlers\Events\Experiencias\GuardaSessaoBooking'
        // ],

        /*
         * Quando uma Experiência for Aprovada pela Vivalá
         * e passar a ficar visível para os usuários
         */
        'App\Events\Experiencias\ExperienciaPublicada' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaExperienciaPublicada',
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoExperienciaPublicada'
        ],

        /*
         * Quando uma Experiência for Desativada pela Vivalá
         * e some da listagem para os usuários (exclusão lógica)
         */
        'App\Events\Experiencias\ExperienciaDesativada' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaExperienciaDesativada',
        ],

        /*
         * Quando uma Experiência for Removida pela Vivalá
         * e a experiência é deletada (exclusão física)
         */
        'App\Events\Experiencias\ExperienciaRemovida' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaExperienciaRemovida',
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoExperienciaRemovida'
        ],

        /*
         * Quando uma Nova Inscrição de Experiência acontecer (nova inscricao)
         */
        'App\Events\Experiencias\NovaInscricaoExperiencia' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaNovaInscricao',
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoPagamentoPendente'
        ],

        /*
         * Quando uma Inscrição de Experiencia for Confirmada
         */
        'App\Events\Experiencias\InscricaoExperienciaConfirmada' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaInscricaoConfirmada',
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoPagamentoConfirmado',
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoInscricaoConfirmada'
        ],

        /*
         * Quando uma Inscricao de Experiência for Cancelada
         */
        'App\Events\Experiencias\InscricaoExperienciaCancelada' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaInscricaoCancelada',
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoInscricaoCancelada',
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoInscricaoCancelada'
        ],

        /*
         * Quando o usuario fornece os dados para gerar boleto
         */
        'App\Events\Experiencias\NovosDadosUsuario' => [
            'App\Handlers\Events\Experiencias\AtualizaDadosUsuario'
        ],

        /*
         * Quando alguem na plataforma clicar em 'propor exp', enviar email para a vivalá com os detalhes fornecidos por quem propôs
         */
        'App\Events\Experiencias\NovaPropostaExperiencia' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaNovaProposta'
        ],

        /**
         * Experiencia eminente, disparar emails para quem ainda nao confirmou, para quem confirmou e para a instiuicao
         */
        'App\Events\Experiencias\ExperienciaEminente' => [
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoExperienciaEminente',
            'App\Handlers\events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoExperienciaEminente'
        ],

        /*
         * Quando uma experiencia acontecer hoje (disparar emails e atualizar inscricoes)
         */
        'App\Events\Experiencias\ExperienciaAconteceHoje' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaExperienciaAconteceHoje',
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoExperienciaAconteceHoje',
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoExperienciaAconteceHoje',
            'App\Handlers\Events\Experiencias\AtualizaStatusInscricoes',
            'App\Handlers\Events\Experiencias\AtualizaStatusExperiencia',
        ],

        /**
         * Pós-Experiencia, quando a experiencia aconteceu a pouco tempo, momento para pedir feedback
         */
        'App\Events\Experiencias\ExperienciaAconteceuRecentemente' => [
          'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoExperienciaAconteceuRecentemente',
          'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoExperienciaAconteceuRecentemente'
        ]

    ];


    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        Ong::observe(new GenericObserver());
        Vaga::observe(new GenericObserver());

        /**
         * @TODO: extrair esse comportamento do delete para um observer
         * e observar os models (a abordagem de um array listando o nome de cada relacao)
         * bem boa
         */

        /**
         * Escutando o evento de deleting para remover os registros das
         * tabelas pivos / relacoes
         */
        CategoriaExperiencia::deleting(function ($categoria)
        {
            //removendo pivos de relacoes belongsToMany
            $categoria->experiencias()->detach();
        });
    }
}
