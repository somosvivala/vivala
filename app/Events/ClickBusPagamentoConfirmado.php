<?php namespace App\Events;

use App\Events\Event;
use App\CompraClickbus;
use Illuminate\Queue\SerializesModels;

class ClickBusPagamentoConfirmado extends Event {

	use SerializesModels;

    //Declarando as propriedades do evento
    public $CompraClickBus;

    /**
     * Create a new event instance.
     * @param $CompraClickBus - Typehinting para garantir consistencia dos dados
     */
    public function __construct(CompraClickbus $CompraClickBus)
    {
        $this->CompraClickBus = $CompraClickBus;
    }

}
