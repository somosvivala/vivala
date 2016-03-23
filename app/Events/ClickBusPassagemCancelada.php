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

    /**
     * Create a new event instance.
     */
    public function __construct(CompraClickbus $CompraClickBus)
    {
        $this->CompraClickBus = $CompraClickBus;
    }
}
