<?php namespace App\Handlers\Events\Experiencias;

use App\Events\ExperienciaOcorrendo;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Interfaces\ExperienciasRepositoryInterface;

class AtualizaExperienciaRealizada
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
     * @param  NovaInscricaoExperiencia $event
     * @return void
     */
    public function handle(ExperienciaOcorrendo $event)
    {
      // Chamando o metodo atualizaInscricoesExperiencia
      // do repositorio de experiencias para
      // atualizar as inscricoes
      $this->ExperienciasRepository->atualizaInscricoesExperiencia($event->Experiencia);
    }

}
