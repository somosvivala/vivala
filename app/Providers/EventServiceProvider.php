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
        * Quando uma Experiência for Aprovada pela Vivalá e
        * passar a ficar visível para todos os candidatos,
        * temos que avisar a Instituição que tudo está ok
        */
        'App\Events\Experiencias\ExperienciaPublicada' => [
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoExperienciaPublicada',
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaExperienciaPublicada',
        ],

        /*
        * Quando uma Experiência for Desativada pela Vivalá
        */
        // 'App\Events\Experiencias\ExperienciaDesativada' => [
        // ],

        /*
        * Quando acontecer uma nova Inscrição de Experiência
        * mandar email para o Candidato e para a Vivalá,
        * não é enviado para Instituição enquanto o
        * candidato não pagar a Experiência (for confirmado)
        */
        'App\Events\Experiencias\NovaInscricaoExperiencia' => [
            'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaNovaInscricao',
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoPagamentoPendente'
        ],

        /*
        * Quando uma Inscrição de Experiencia for confirmada
        * isto é, o candidato pagou, mandar um email
        * avisando o candidato e a instituição
        */
        'App\Events\Experiencias\InscricaoExperienciaConfirmada' => [
            'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoPagamentoConfirmado',
            'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoInscricaoConfirmada'
        ],

        //Quando uma inscricao for cancelada, ainda nao confirmada, tomar alguma ação?
         'App\Events\Experiencias\InscricaoExperienciaCancelada' => [
             'App\Handlers\Events\Experiencias\Candidato\EnviaEmailExperienciaCandidatoInscricaoCancelada',
             'App\Handlers\Events\Experiencias\Instituicao\EnviaEmailExperienciaInstituicaoInscricaoCancelada',
             'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaPlataformaInscricaoCancelada'
        ],

        //Quando ocorrer uma experiencia (atualizar inscricoes)
        'App\Events\Experiencias\ExperienciaOcorrendo' => [
            'App\Handlers\Events\Experiencias\AtualizaExperienciaRealizada',
        ],

        //Quando o usuario fornece os dados para gerar boleto
        'App\Events\Experiencias\NovosDadosUsuario' => [
            'App\Handlers\Events\Experiencias\AtualizaDadosUsuario'
        ],

        //Quando uma experiencia estiver eminente, disparar emails para quem ainda nao confirmou, para quem confirmou e para a instiuicao
        // 'App\Events\ExperienciaEminente' => [
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaDataEminenteConfirmados',
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaDataEminenteDesConfirmados',
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaDataEminenteInstituicao'
        // ],

        //Quando alguem na plataforma clicar em 'propor exp', enviar email para a vivalá com os detalhes fornecidos por quem propôs
        'App\Events\Experiencias\NovaPropostaExperiencia' => [
          'App\Handlers\Events\Experiencias\Plataforma\EnviaEmailExperienciaNovaProposta'
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
