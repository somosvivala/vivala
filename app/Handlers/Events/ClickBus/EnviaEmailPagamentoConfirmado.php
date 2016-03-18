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

            // TESTE MAIL ClickBus
            $message->to('brunoluizgr@gmail.com', 'TesteBrunol')->subject('[CLICKBUS] Obrigado, seu pagamento foi confirmado!');
            //$message->to($Compra->email, $User->perfil->apelido)->subject('Obrigado, seu pagamento foi confirmado!');
            $message->from('noreply@vivalabrasil.com.br', 'Vivalá');
        });
    }
}
