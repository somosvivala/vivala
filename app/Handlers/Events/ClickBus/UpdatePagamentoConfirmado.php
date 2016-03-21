<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusPagamentoConfirmado;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

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
            $CompraClickBus = $event->CompraClickBus;
            $CompraClickBus->save();
	}

}
