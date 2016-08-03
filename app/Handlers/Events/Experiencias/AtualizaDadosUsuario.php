<?php namespace App\Handlers\Events\Experiencias;

use App\Events\NovoPedidoGeracaoBoletoExperiencia;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class AtualizaDadosUsuario
{

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
     * @param  NovoPedidoGeracaoBoletoExperiencia  $event
     * @return void
     */
    public function handle(NovoPedidoGeracaoBoletoExperiencia $event)
    {
        //fazendo update dos novos dados do usuario (cpf , cep, dados do endereco)
        $event->user->update($event->novosDadosUsuario);
    }

}
