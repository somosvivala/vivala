<?php namespace App\Handlers\Events\Experiencias\Plataforma;

use App\Events\Experiencias\ExperienciaDesativada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Experiencias;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaPlataformaExperienciaDesativada
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
	 * @param  ExperienciaDesativada  $event
	 * @return void
	 */
	public function handle(ExperienciaDesativada $event)
	{
		// Usa o método enviaEmailExperienciaPlataformaExperienciaDesativada do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaPlataformaExperienciaDesativada($event->Experiencia);
	}

}
