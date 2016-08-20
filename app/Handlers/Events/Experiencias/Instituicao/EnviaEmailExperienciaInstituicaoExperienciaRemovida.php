<?php namespace App\Handlers\Events\Experiencias\Instituicao;

use App\Events\Experiencias\ExperienciaRemovida;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Experiencia;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaInstituicaoExperienciaRemovida
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
	 * @param  ExperienciaRemovida  $event
	 * @return void
	 */
	public function handle(ExperienciaRemovida $event)
	{
		// Usa o método enviaEmailExperienciaInstituicaoExperienciaPublicada do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaInstituicaoExperienciaRemovida($event->Experiencia);
	}

}
