<?php namespace App\Handlers\Events\ClickBus;

use App\Events\PagamentoConfirmado;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailPagamentoConfirmado {

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
	 * @param  PagamentoConfirmado  $event
	 * @return void
	 */
	public function handle(PagamentoConfirmado $event)
	{
		//
	}

}
