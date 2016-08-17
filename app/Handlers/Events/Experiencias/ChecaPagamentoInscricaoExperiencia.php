<?php namespace App\Handlers\Events\Experiencias;

use App\Events\InscricaoExperienciaConfirmada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Interfaces\ExperienciasRepositoryInterface;

class ChecaPagamentoInscricaoExperiencia
{
    //Instancia do repositorio de Experiencias
    private $ExperienciasRepository;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(ExperienciasRepositoryInterface $repository)
    {
        $this->ExperienciasRepository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  InscricaoExperienciaConfirmada  $event
     * @return void
     */
    public function handle(InscricaoExperienciaConfirmada $event)
    {
      // Chamando o metodo confirmaInscricaoExperiencia
      // do repositorio de experiencias para
      // atualizar as inscricoes
      $this->ExperienciasRepository->confirmaInscricaoExperiencia($event->Inscricao);
    }

}
