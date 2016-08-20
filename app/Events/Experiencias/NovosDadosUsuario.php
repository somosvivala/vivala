<?php namespace App\Events\Experiencias;

use App\Events\Event;
use App\User;

use Illuminate\Queue\SerializesModels;

class NovosDadosUsuario extends Event
{
    use SerializesModels;

    //Objetos
    public $Experiencia;
    public $User;

    //Variáveis
    public $novosDadosUsuario;


    /**
     * Create a new event instance.
     * @param $user - Instancia de User
     * @param $novosDadosUsuario - array de GerarBoletoInscricaoExperienciaRequest
     *
     * @return void
     */
    public function __construct(User $user, $novosDadosUsuario)
    {
        $this->User = $user;
        $this->novosDadosUsuario = $novosDadosUsuario;
    }

}
