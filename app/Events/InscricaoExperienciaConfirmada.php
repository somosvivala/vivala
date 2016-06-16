<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\InscricaoExperiencia;

class InscricaoExperienciaConfirmada extends Event
{

    use SerializesModels;

    //informacoes que o evento precisa propagar
    public $inscricao;


    /**
     * Create a new event instance.
     *
     * @param $experienciaID - ID da experiencia que recebeu uma nova inscricao
     * @param $perfilID - ID do perfil que se inscreveu
     * @return void
     */
    public function __construct(InscricaoExperiencia $inscricao)
    {
        $this->inscricao = $inscricao;
    }

}
