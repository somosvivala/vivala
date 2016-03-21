<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusCompraFinalizada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailCompraFinalizada {

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
	 * @param  ClickBusCompraFinalizada  $event
	 * @return void
	 */
	public function handle(ClickBusCompraFinalizada $event)
	{
            $Compra = $event->CompraClickBus;

            if ($Compra->status == 'payment_confirmed') {
                //Envia email de sucesso no pagamento
                Mail::send('emails.clickbus.sucesso', ['compra' => $Compra], function ($message) use ($Compra) {
                    $message->to($Compra->email, $User->perfil->apelido)->subject('Obrigado, seu pagamento foi confirmado!');
                    $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
                });
            } else {
                //Envia email de pagamento pendente
                Mail::send('emails.clickbus.pendente', ['compra' => $Compra], function ($message) use ($Compra) {
                    $message->to($Compra->email, $User->perfil->apelido)->subject('Obrigado, seu pagamento foi confirmado!');
                    $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
                });
            }
	}

}
