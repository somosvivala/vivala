<?php namespace App\Handlers\Events\Experiencias\Plataforma;

use App\Events\Experiencias\NovaInscricaoExperiencia;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\InscricaoExperiencia;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaPlataformaNovaInscricao
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
	* @param  NovaInscricaoExperiencia  $event
	* @return void
	*/
	public function handle(NovaInscricaoExperiencia $event)
	{
		// Usa o método enviaEmailExperienciaPlataformaNovaInscricao do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaPlataformaNovaInscricao($event->Inscricao);
	}

}
