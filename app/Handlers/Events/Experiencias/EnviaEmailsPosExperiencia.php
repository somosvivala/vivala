<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaAconteceuRecentemente;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailsPosExperiencia
{
    private $mailSenderRepository;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(MailSenderRepository $repository)
    {
        $this->mailSenderRepository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  ExperienciaAconteceuRecentemente  $event
     * @return void
     */
    public function handle(ExperienciaAconteceuRecentemente $event)
    {
        $Experiencia = $event->Experiencia;
        $dataFormatada = $event->DataOcorrencia->data_ocorrencia->format('Y-m-d');

        //Pegando as inscricoes confirmadas para esse dia
        $inscricoesConfirmadasNessaData = $Experiencia->inscricoes()->confirmadas()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //2-Iterar sob os inscritos disparando o email de feedback sobre a experiencia
        foreach ($inscricoesConfirmadasNessaData as $Inscricao) {
            //$this-mailSenderRepository->envia email feedback no pós experiencia p/ candidato
        }

        //3-Disparar email de feedback para o owner
        //$this->mailSenderRepository-> envia email feedback no pós experiencia p/ Owner
        
    }

}
