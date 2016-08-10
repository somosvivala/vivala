<?php namespace App\Events;

use App\Events\Event;
use App\User;

use Illuminate\Queue\SerializesModels;

class NovosDadosUsuario extends Event
{

    use SerializesModels;

    public $experiencia;
    public $novosDadosUsuario;
    public $user;


    /**
     * Create a new event instance.
     * @param $user - Instancia de User
     * @param $novosDadosUsuario - array de GerarBoletoInscricaoExperienciaRequest
     *
     * @return void
     */
    public function __construct(User $user, $novosDadosUsuario)
    {
        $this->user = $user;
        $this->novosDadosUsuario = $novosDadosUsuario;
    }

}
