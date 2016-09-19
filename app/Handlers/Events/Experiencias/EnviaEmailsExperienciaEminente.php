<?php namespace App\Handlers\Events\Experiencias;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Events\Experiencias\ExperienciaEminente;
use App\Repositories\MailSenderRepository;

class EnviaEmailsExperienciaEminente
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
     * @param  ExperienciaEminente  $event
     * @return void
     */
    public function handle(ExperienciaEminente $event)
    {
        $Experiencia = $event->Experiencia;
        $dataFormatada = $event->DataOcorrencia->data_ocorrencia->format('Y-m-d');

        //Pegando as inscricoes ativas para esse dia (inscricoes pendentes + confirmadas)
        $inscricoesAtivasNessaData = $Experiencia->inscricoes()->ativas()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //Pegando as inscricoes confirmadas para esse dia
        $inscricoesConfirmadasNessaData = $Experiencia->inscricoes()->confirmadas()
            ->where('data_ocorrencia_experiencia', $dataFormatada)
            ->get();

        //Iterando sob os inscritos disparando o email conforme o status da inscricao
        foreach ($inscricoesAtivasNessaData as $Inscricao) {
            //Se a inscricao tiver sido confirmada
            if($Inscricao->isConfirmada) {
                $this->mailSenderRepository->enviaEmailExperienciaCandidatoInscricaoConfirmadaExperienciaEminente($Inscricao);
            }
            else if ($Inscricao->isPendente) {
                $this->mailSenderRepository->enviaEmailExperienciaCandidatoInscricaoPendenteExperienciaEminente($Inscricao);
            }
        }

        //Checando se existem inscricoes confirmadas para disparar o email pra instituicao
        if ( ! $inscricoesConfirmadasNessaData->isEmpty() ) {
            //Disparar email de experiecia eminente para o owner com a lista de inscritos confirmados
            $this->mailSenderRepository->enviaEmailExperienciaInstituicaoExperienciaEminente($inscricoesConfirmadasNessaData);
        }
    }

}
