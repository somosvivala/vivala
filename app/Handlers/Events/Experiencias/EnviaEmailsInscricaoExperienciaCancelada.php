<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\InscricaoExperienciaCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\Repositories\MailSenderRepository;

class EnviaEmailsInscricaoExperienciaCancelada
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
     * @param  InscricaoExperienciaCancelada  $event
     * @return void
     */
    public function handle(InscricaoExperienciaCancelada $event)
    {
        $Inscricao = $event->Inscricao;

        //se nao tivermos confirmado o pagamento dessa inscricao entao nao tem problema o cancelamento
        if ($Inscricao->isPendente) {
            $this->mailSenderRepository->EnviaEmailExperienciaCandidatoInscricaoCancelada($Inscricao);
        }

        //se foi confirmado o pagamento, entao só podemos disparar emails quando a inscricao for deletada pelo admin
        else if ($Inscricao->deleted_at) {
            $this->mailSenderRepository->EnviaEmailExperienciaCandidatoInscricaoCancelada($Inscricao);
            $this->mailSenderRepository->EnviaEmailExperienciaInstituicaoInscricaoCancelada($Inscricao);
        }

    }

}
