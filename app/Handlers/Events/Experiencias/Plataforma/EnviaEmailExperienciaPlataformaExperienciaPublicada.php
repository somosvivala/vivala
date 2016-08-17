<?php namespace App\Handlers\Events\Experiencias\Plataforma;

use App\Events\Experiencias\ExperienciaPublicada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\Experiencias;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaPlataformaExperienciaPublicada
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
	* @param  ExperienciaPublicada  $event
	* @return void
	*/
	public function handle(ExperienciaPublicada $event)
	{
		// Usa o método enviaEmailExperienciaPlataformaExperienciaPublicada do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaPlataformaExperienciaPublicada($event->Experiencia);
	}

}
