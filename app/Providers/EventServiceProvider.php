<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Observers\GenericObserver;
use App\Vaga;
use App\Ong;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],

                //Aqui registro um Evento para seus Listeners
		'App\Events\PerfilHasVolunteered' => [
			'App\Handlers\Events\SendMailsWhenPerfilHasVolunteered',
		],

		'App\Events\ClickBusPagamentoConfirmado' => [
			'App\Handlers\Events\ClickBus\UpdatePagamento',
			'App\Handlers\Events\ClickBus\EnviaEmailPagamentoConfirmado',
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
	}

}
