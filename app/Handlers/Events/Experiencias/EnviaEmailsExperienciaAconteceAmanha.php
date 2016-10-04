<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaAconteceAmanha;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Repositories\MailSenderRepository;

class EnviaEmailsExperienciaAconteceAmanha
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
     * @param  ExperienciaAconteceAmanha  $event
     * @return void
     */
    public function handle(ExperienciaAconteceAmanha $event)
    {
        $Experiencia = $event->Experiencia;
        $dataFormatada = $event->DataOcorrencia->data_ocorrencia->format('Y-m-d');

        //Pegando as inscricoes confirmadas para esse dia
        $inscricoesConfirmadasNessaData = $Experiencia->inscricoes()->confirmadas()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //Iterando sob os inscritos disparando o email avisando sobre a ocorencia da experiencia
        foreach ($inscricoesConfirmadasNessaData as $Inscricao) {
            $this->mailSenderRepository->enviaEmailExperienciaCandidatoInscricaoConfirmadaExperienciaAmanha($Inscricao);
        }

        //Se tiver de fato pessoas confirmadas entao enviamos a lista de pessoas para a Instituicao
        if ( ! $inscricoesConfirmadasNessaData->isEmpty() ) {
            //Disparar email de experiecia acontece amanhã para o owner com a lista de inscritos confirmados
            $this->mailSenderRepository->enviaEmailExperienciaInstituicaoExperienciaAmanha($inscricoesConfirmadasNessaData);

            //Disparar email para a vivalá notificando a ocorrencia da experiencia amanhã
            $this->mailSenderRepository->enviaEmailExperienciaPlataformaExperienciaAmanha($inscricoesConfirmadasNessaData);
        }

    }
}
