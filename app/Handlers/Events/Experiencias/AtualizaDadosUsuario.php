<?php namespace App\Handlers\Events\Experiencias;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Events\Experiencias\NovosDadosUsuario;

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
    public function handle(NovosDadosUsuario $event)
    {
        //fazendo update dos novos dados do usuario (cpf , cep, dados do endereco)
        $event->user->update($event->novosDadosUsuario);
    }

}
