<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class NovaInscricaoExperiencia extends Event
{

    use SerializesModels;

    //informacoes que o evento precisa propagar
    public $experienciaID;
    public $perfilID;


    /**
     * Create a new event instance.
     *
     * @param $experienciaID - ID da experiencia que recebeu uma nova inscricao
     * @param $perfilID - ID do perfil que se inscreveu
     * @return void
     */
    public function __construct($experienciaID, $perfilID)
    {
        $this->experienciaID = $experienciaID;
        $this->perfilID = $perfilID;
    }

}
