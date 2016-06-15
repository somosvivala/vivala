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

        //Quando alguém finaliza a Cotação de uma Viagem
        'App\Events\NovaCotacaoViagem' => [
            'App\Handlers\Events\CotacaoViagem\EnviaEmailCotacaoViagem',
        ],

        //Quando ocorrer alguma acao que sera guardada no log
        'App\Events\NovaInteracaoPlataforma' => [
            'App\Handlers\Events\Logger\CriarLogInteracaoPlataforma',
        ],

        /*
        * Experiencias - Todos os eventos relacionados a feature de Experiencias da plataforma
        */

        //Quando acontecer um booking deslogado, guardar na sesssao a pagina para sabermos se houve desistencia no cadastro
        // 'App\Events\BookouDeslogado' => [
        //     'App\Handlers\Events\Experiencias\GuardaSessaoBooking'
        // ],

        //Quando acontecer uma nova inscricao de experiencia, mandar email para o candidato e para a vivalá
        'App\Events\NovaInscricaoExperiencia' => [
            'App\Handlers\Events\Experiencias\CriaInscricaoExperiencia',
            'App\Handlers\Events\Experiencias\EnviaEmailExperienciaNovaInscricaoCandidato',
            'App\Handlers\Events\Experiencias\EnviaEmailExperienciaNovaInscricaoPlataforma'
        ],

        //Quando uma inscricao de experiencia for confirmada, avisar o candidato e a instituição
        'App\Events\InscricaoExperienciaConfirmada' => [
            'App\Handlers\Events\Experiencias\EnviaEmailExperienciaInscricaoConfirmadaCandidato',
            'App\Handlers\Events\Experiencias\EnviaEmailExperienciaInscricaoConfirmadaInstituicao'
        ],

        //Quando uma inscricao for desconfirmada? (avisar a instituição?)
        // 'App\Events\InscricaoExperienciaDesConfirmada' => [
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaInscricaoDesConfirmadaInstituicao'
        // ],

        //Quando uma experiencia estiver eminente, disparar emails para quem ainda nao confirmou, para quem confirmou e para a instiuicao
        // 'App\Events\ExperienciaEminente' => [
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaDataEminenteConfirmados',
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaDataEminenteDesConfirmados',
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaDataEminenteInstituicao'
        // ],

        //Quando uma inscricao for cancelada, ainda nao confirmada, tomar alguma ação?
        // 'App\Events\InscricaoExperiencaCancelada' => [
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaCancelada'
        // ],

        //Quando uma experiencia for aprovada pela vivalá e passar a ficar visivel para os candidatos (avisar instituição)
        // 'App\Events\ExperienciaAprovada' => [
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaAprovada'
        // ],

        //Quando alguem na plataforma clicar em 'propor exp', enviar email para a vivalá com os detalhes fornecidos por quem propôs
        // 'App\Events\NovaPropostaExperiencia' => [
        //     'App\Handlers\Events\Experiencias\EnviaEmailExperienciaNovaProposta'
        // ],

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
