<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusPagamentoConfirmado;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Repositories\ClickBusRepository;

class UpdatePagamentoConfirmado {


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
	 * @param  ClickBusPagamentoConfirmado  $event
	 * @return void
	 */
	public function handle(ClickBusPagamentoConfirmado $event)
	{
      $event->CompraClickBus->update([
          'status' => $this->clickBusRepository->FLAG_PAGAMENTO_CONFIRMADO,
          'data_pagamento' => Carbon::now()
      ]);
	}

}
