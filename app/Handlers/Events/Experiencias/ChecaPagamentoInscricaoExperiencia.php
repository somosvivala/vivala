<?php namespace App\Handlers\Events\Experiencias;

use App\Events\InscricaoExperienciaConfirmada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Interfaces\ExperienciasRepositoryInterface;

class ChecaPagamentoInscricaoExperiencia
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
     * @param  InscricaoExperienciaConfirmada  $event
     * @return void
     */
    public function handle(InscricaoExperienciaConfirmada $event)
    {
        $this->experienciasRepository->confirmaInscricaoExperiencia($event->inscricao);
    }

}
