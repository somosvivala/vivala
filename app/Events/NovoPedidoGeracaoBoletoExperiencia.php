<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\Experiencia;
use App\User;

class NovoPedidoGeracaoBoletoExperiencia extends Event
{

    use SerializesModels;

    public $experiencia;
    public $novosDadosUsuario;
    public $user;


    /**
     * Create a new event instance.
     * @param $experiencia  Instancia de Experiencia
     * @param $user - Instancia de User
     * @param $novosDadosUsuario - array de GerarBoletoInscricaoExperienciaRequest
     *
     * @return void
     */
    public function __construct(Experiencia $experiencia, User $user, $novosDadosUsuario)
    {
        $this->experiencia = $experiencia;
        $this->user = $user;
        $this->novosDadosUsuario = $novosDadosUsuario;
    }

}
