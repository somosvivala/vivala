<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaAconteceuRecentemente;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Repositories\MailSenderRepository;

class EnviaEmailsExperienciaAconteceuRecentemente
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

        //Pegando as inscricoes concluidas (que de fato foram) para esse dia
        //atualmente todas as inscricoes confirmadas se tornam concluidas no dia da experiencia
        //mas o status concluida serve para possibilitar um estagio intermediario de aprovacao de quem de fato compareceu.
        $inscricoesConcluidasNessaData = $Experiencia->inscricoes()->concluidas()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //2-Iterar sob os inscritos disparando o email de feedback sobre a experiencia
        foreach ($inscricoesConcluidasNessaData as $Inscricao) {
            //$this-mailSenderRepository->envia email feedback no pós experiencia p/ candidato
        }

        //3-Disparar email de feedback para o owner
        //$this->mailSenderRepository-> envia email feedback no pós experiencia p/ Owner
    }

}
