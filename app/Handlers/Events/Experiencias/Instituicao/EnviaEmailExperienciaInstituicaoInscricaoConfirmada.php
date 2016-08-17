<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\InscricaoExperienciaConfirmada;

use App\InscricaoExperiencia;
use App\Repositories\MailSenderRepository;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaInstituicaoInscricaoConfirmada
{
	// Cria instância de mailSenderRepository para ser usada aqui
	private $mailSenderRepository;

	/**
	* Create the event handler.
	*
	* @return void
	*/
	public function __construct(MailSenderRepository $repository)
	{
		// A instância criada aqui (this) recebe o repositório tipo MailSenderRepository
		$this->mailSenderRepository = $repository;
	}

	/**
	 * Handle the event.
	 *
	 * @param  InscricaoExperienciaConfirmada  $event
	 * @return void
	 */
	public function handle(InscricaoExperienciaConfirmada $event)
	{
		// Usa o método enviaEmailExperienciaInstituicaoInscricaoConfirmada do mailSenderRepository para enviar o email
		$this->mailSenderRepository->enviaEmailExperienciaInstituicaoInscricaoConfirmada($event);
	}

}
