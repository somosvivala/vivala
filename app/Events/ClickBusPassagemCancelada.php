<?php

namespace app\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use App\CompraClickbus;

class ClickBusPassagemCancelada extends Event
{
    use SerializesModels;

    //Declarando as propriedades do evento
    public $CompraClickBus;
    public $status_pagamento;

    /**
     * Create a new event instance.
     */
    public function __construct(ClickbusCompra $compra, $status_pagamento)
    {
        $this->CompraClickBus = $CompraClickBus;
        $this->status_pagamento = $status_pagamento;
    }
}
