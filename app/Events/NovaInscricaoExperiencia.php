<?php namespace App\Events;

use App\Events\Event;
use App\User;
use App\Experiencia;
use Illuminate\Queue\SerializesModels;

class NovaInscricaoExperiencia extends Event
{

    use SerializesModels;

    // Informaçãoos que o evento precisa propagar
    public $Inscricao;


    /**
     * Create a new event instance.
     *
     * @param $Experiencia - Experiencia que recebeu uma nova inscricao
     * @param $Usuario - Usuario que se inscreveu
     * @return void
     */
    public function __construct(Inscricao $inscricao)
    {
        $this->Inscricao = $inscricao;
    }

}
