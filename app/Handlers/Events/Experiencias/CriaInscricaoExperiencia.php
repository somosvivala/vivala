<?php namespace App\Handlers\Events\Experiencias;

use App\Events\NovaInscricaoExperiencia;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Experiencia;
use App\Perfil;

class CriaInscricaoExperiencia
{

    //instancia do repositorio de experiencias
    private $experienciasRepository;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(ExperienciasRepositoryInterface $repository)
    {
        $this->experienciasRepository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  NovaInscricaoExperiencia $event
     * @return void
     */
    public function handle(NovaInscricaoExperiencia $event)
    {
        $this->experienciasRepository->createInscricaoExperiencia($event->experienciaID, $event->perfil);
    }

}
