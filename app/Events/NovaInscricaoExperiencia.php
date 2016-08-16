<?php namespace App\Events;

use App\Events\Event;
use App\User;
use App\Experiencia;
use Illuminate\Queue\SerializesModels;

class NovaInscricaoExperiencia extends Event
{

    use SerializesModels;

    // Informaçãoos que o evento precisa propagar
    //public $experienciaID;
    //public $perfilID;
    public $experiencia;
    public $usuario;


    /**
     * Create a new event instance.
     *
     * @param $experienciaID - ID da experiencia que recebeu uma nova inscricao
     * @param $perfilID - ID do perfil que se inscreveu
     * @return void
     */
    //public function __construct($experienciaID, $perfilID)
    public function __construct(Experiencia $experiencia, User $usuario)
    {
        //$this->experienciaID = $experienciaID;
        //$this->perfilID = $perfilID;
        $this->experiencia = $experiencia;
        $this->usuario = $usuario;
    }

}
