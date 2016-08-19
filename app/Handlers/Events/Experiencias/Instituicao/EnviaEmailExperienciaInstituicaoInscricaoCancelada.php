<?php namespace App\Handlers\Events\Experiencias\Instituicao;

use App\Events\Experiencias\InscricaoExperienciaCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\InscricaoExperiencia;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaInstituicaoInscricaoCancelada
{
	// Cria instância de mailSenderRepository para ser usada aqui
	private $MailSenderRepository;

	/**
	* Create the event handler.
	*
	* @return void
	*/
	public function __construct(MailSenderRepository $repository)
	{
		// A instância criada aqui (this) recebe o repositório tipo MailSenderRepository
		$this->MailSenderRepository = $repository;
	}

	/**
	 * Handle the event.
	 *
	 * @param  InscricaoExperienciaCancelada $event
	 * @return void
	 */
	public function handle(InscricaoExperienciaCancelada $event)
	{
		// Usa o método enviaEmailExperienciaInstituicaoInscricaoCancelada do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaInstituicaoInscricaoCancelada($event->Inscricao);
	}

}
