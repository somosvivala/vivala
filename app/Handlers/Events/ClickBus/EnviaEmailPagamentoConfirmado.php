<?php namespace App\Handlers\Events\ClickBus;

use App\Events\ClickBusPagamentoConfirmado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class EnviaEmailPagamentoConfirmado {

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
	 * @param  ClickBusPagamentoConfirmado  $event
	 * @return void
	 */
	public function handle(ClickBusPagamentoConfirmado $event)
	{
      $Compra = $event->CompraClickBus;

      //Envia email de passagem cancelada
      Mail::send('emails.clickbus.sucesso', ['Compra' => $Compra], function ($message) use ($Compra) {
            $message->to($Compra->user->email, $Compra->user->perfil->apelido)->subject(trans('clickbus.clickbus_email-vivala-subject-pending'));
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
      });
	}

}
