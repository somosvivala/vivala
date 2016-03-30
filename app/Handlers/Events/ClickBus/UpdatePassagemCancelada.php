<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusPassagemCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Repositories\ClickBusRepository;

class UpdatePassagemCancelada {


	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(ClickBusRepository $repository)
	{
		$this->clickBusRepository = $repository;
	}

	/**
	 * Handle the event.
	 *
	 * @param  ClickBusPassagemCancelada  $event
	 * @return void
	 */
	public function handle(ClickBusPassagemCancelada $event)
	{
      $event->CompraClickBus->update([
          'status' => $this->clickBusRepository->FLAG_PASSAGEM_CANCELADA
      ]);
	}

}
