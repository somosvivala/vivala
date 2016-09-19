<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaAconteceHoje;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Interfaces\ExperienciasRepositoryInterface;

class AtualizaStatusInscricoes
{
    //instancia do repositorio de experiencias que contem a logica necessaria para essa situacao
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
        $dataFormatada = $event->DataOcorrencia->data_ocorrencia->format('Y-m-d');

        //Pegando as inscricoes confirmadas para esse dia
        $inscricoesConfirmadasNessaData = $Experiencia->inscricoes()->confirmadas()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //Pegando as inscricoes confirmadas para esse dia
        $inscricoesPendentesNessaData = $Experiencia->inscricoes()->pendentes()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //Atualizar lista de inscricoes (confirmadas -> concluidas) && (pendentes -> expiradas)
        $this->experienciasRepository->atualizaInscricoesConfirmadasParaConcluidas($inscricoesConfirmadasNessaData);
        $this->experienciasRepository->atualizaInscricoesPendentesParaExpiradas($inscricoesPendentesNessaData);
    }
}
