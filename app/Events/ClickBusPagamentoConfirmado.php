<?php

namespace app\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use App\CompraClickbus;

class ClickBusPagamentoConfirmado extends Event
{
    use SerializesModels;

    //Declarando as propriedades do evento
    public $CompraClickBus;

    /**
     * Create a new event instance.
     * @param $CompraClickBus - Typehinting para garantir consistencia dos dados
     * @param $status_pagamento - String contendo o status atual do pagamento
     */
    public function __construct(CompraClickbus $CompraClickBus)
    {
        $this->CompraClickBus = $CompraClickBus;
    }
}
