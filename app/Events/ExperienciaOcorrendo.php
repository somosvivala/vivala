<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class ExperienciaOcorrendo extends Event
{
    //informacoes que o evento precisa propagar
    public $experiencia;

    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Experiencia $experiencia)
    {
        $this->experiencia = $experiencia;
    }

}
