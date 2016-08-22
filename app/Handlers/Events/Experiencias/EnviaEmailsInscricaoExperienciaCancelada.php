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
        if (!$Inscricao->temPagamentoConfirmado) {
            $this->mailSenderRepository->enviaEmailExperienciaCandidatoInscricaoCancelada($Inscricao);
        }

        //@todo: um email de reembolso em analise, ou algo que de um feedback para o usuario
        //no momento do cancelamento da inscricao. Como está atualmente, se a inscricao ja estiver confirmada
        //o email de cancelamento só sera disparado quando alguem confirmar clicando no botao da tela de gestao

        //se foi confirmado o pagamento, entao só podemos disparar emails quando a inscricao for deletada pelo admin
        else if ($Inscricao->deleted_at) {
            $this->mailSenderRepository->enviaEmailExperienciaCandidatoInscricaoCancelada($Inscricao);
            $this->mailSenderRepository->enviaEmailExperienciaInstituicaoInscricaoCancelada($Inscricao);
        }

    }

}
