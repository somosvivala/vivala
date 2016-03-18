<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class ClickBusPagamentoConfirmado extends Event {

	use SerializesModels;

        public $CompraClickBus;
				public $status_pagamento;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
        public function __construct(CompraClickBus $CompraClickBus, $status_pagamento)
	{
            $this->CompraClickBus = $CompraClickBus;
            $this->status_pagamento = $status_pagamento;
	}

}
