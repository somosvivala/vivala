<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusPagamentoConfirmado;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Repositories\ClickBusRepository;

class UpdatePagamentoConfirmado {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  ClickBusPagamentoConfirmado  $event
	 * @return void
	 */
	public function handle(ClickBusPagamentoConfirmado $event)
	{
		$event->CompraClickBus->update(['status' => ClickBusRepository::$FLAG_PAGAMENTO_CONFIRMADO]);
	}

}
