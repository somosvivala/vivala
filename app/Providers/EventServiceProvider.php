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
