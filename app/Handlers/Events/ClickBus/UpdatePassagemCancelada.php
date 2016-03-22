<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusPassagemCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class UpdatePassagemCancelada {

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
	 * @param  ClickBusPassagemCancelada  $event
	 * @return void
	 */
	public function handle(ClickBusPassagemCancelada $event)
	{
      $event->CompraClickbus->update(['status' => ClickBusRepository::$FLAG_PASSAGEM_CANCELADA]);
	}

}
