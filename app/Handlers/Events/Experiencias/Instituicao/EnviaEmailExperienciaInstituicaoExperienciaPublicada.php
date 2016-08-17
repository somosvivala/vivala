<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\ExperienciaPublicada;

use App\Experiencia;
use App\Repositories\MailSenderRepository;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaInstituicaoExperienciaPublicada
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
	 * @param  ExperienciaPublicada  $event
	 * @return void
	 */
	public function handle(ExperienciaPublicada $event)
	{
		// Usa o método enviaEmailExperienciaPlataformaExperienciaPublicada do mailSenderRepository para enviar o email
		$this->mailSenderRepository->enviaEmailExperienciaPlataformaExperienciaPublicada($event);
	}

}
