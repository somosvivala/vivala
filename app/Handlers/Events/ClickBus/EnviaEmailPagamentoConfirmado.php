<?php

namespace app\Handlers\Events\ClickBus;

use App\Events\ClickBusPagamentoConfirmado;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class EnviaEmailPagamentoConfirmado implements ShouldBeQueued
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
        $Compra = $event->CompraClickBus;

        //Envia email de sucesso no pagamento
        Mail::send('emails.clickbus.sucesso', ['compra' => $Compra], function ($message) use ($Compra) {
            $message->to($Compra->email, $User->perfil->apelido)->subject(trans('clickbus.clickbus_email-vivala-subject-success'));
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });
    }
}
