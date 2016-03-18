<?php

namespace app\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class ClickBusPagamentoConfirmado extends Event
{
    use SerializesModels;

    //Declarando as propriedades do evento
    public $CompraClickBus;
    public $status_pagamento;

    /**
     * Create a new event instance.
     * @param $CompraClickBus - Typehinting para garantir consistencia dos dados
     * @param $status_pagamento - String contendo o status atual do pagamento
     */
    public function __construct(CompraClickBus $CompraClickBus, $status_pagamento)
    {
        $this->CompraClickBus = $CompraClickBus;
        $this->status_pagamento = $status_pagamento;
    }
}
