<?php namespace App\Events\Experiencias;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\Experiencia;
use App\DataOcorrenciaExperiencia;

class ExperienciaAconteceHoje extends Event
{
    use SerializesModels;

    //Informacoes que o evento vai propagar
    public $Experiencia;
    public $DataOcorrencia;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Experiencia $experiencia, DataOcorrenciaExperiencia $dataOcorrencia)
    {
        $this->Experiencia = $experiencia;
        $this->DataOcorrenciaExperiencia = $dataOcorrencia;
    }

}
