<?php namespace App\Handlers\Events\Experiencias;

use App\Events\ExperienciaOcorrendo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Interfaces\ExperienciasRepositoryInterface;

class AtualizaExperienciaRealizada
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
    public function handle(ExperienciaOcorrendo $event)
    {
        // chamando o metodo do repositorio de experiencias para atualizar as inscricoes
        $this->experienciasRepository->atualizaInscricoesExperiencia($event->experiencia);
    }

}
