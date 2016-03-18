<?php

namespace app\Handlers\Events\ClickBus;

use App\Events\ClickBusPagamentoConfirmado;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class UpdatePagamento implements ShouldBeQueued
{
    /**
     * Create the event handler.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ClickBusPagamentoConfirmado $event
     */
    public function handle(ClickBusPagamentoConfirmado $event)
    {
        $CompraClickBus = $event->CompraClickBus;
        $status_pagamento = $event->status_pagamento;
    }
}
