<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaAconteceHoje;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailsExperienciaAconteceHoje
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

        //Iterando sob os inscritos disparando o email avisando sobre a ocorencia da experiencia
        foreach ($inscricoesConfirmadasNessaData as $Inscricao) {
            //$this-mailSenderRepository->envia email dia da experiencia p/ candidato
        }

        //3-Disparar email de experiecia eminente para o owner com a lista de inscritos confirmados
        //$this->mailSenderRepository-> envia email dia da experiencia p/ Owner ($inscricoesConfirmadasNessaData)

        //4-Disparar email para a vivalá notificando a ocorrencia da experiencia,
        //$this->mailSenderRepository-> envia email dia da experiencia p/ Vivalá ($inscricoesConfirmadasNessaData)

    }
}
