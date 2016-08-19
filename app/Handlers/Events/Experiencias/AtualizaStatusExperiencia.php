<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaAconteceHoje;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Interfaces\ExperienciasRepositoryInterface;

class AtualizaStatusExperiencia
{
    private $experienciasRepository;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(ExperienciasRepositoryInterface $repositorioExperiencias)
    {
        $this->experienciasRepository = $repositorioExperiencias;
    }

    /**
     * Handle the event.
     *
     * @param  ExperienciaAconteceHoje  $event
     * @return void
     */
    public function handle(ExperienciaAconteceHoje $event)
    {
        $Experiencia = $event->Experiencia;

        //Atualizando status da experiencia caso tipo evento_unico status -> concluida
        if ($Experiencia->isEventoUnico) {
            $this->experienciasRepository->finalizaExperienciaEventoUnico($Experiencia);
        }
    }
}
