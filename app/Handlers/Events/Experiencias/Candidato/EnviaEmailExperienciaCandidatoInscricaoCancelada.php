<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\InscricaoExperienciaCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaCandidatoInscricaoCancelada
{
	// Cria instância de mailSenderRepository para ser usada aqui
	private $mailSenderRepository;

	/**
	* Create the event handler.
	*
	* @return void
	*/
	public function __construct()
	{
		// A instância criada aqui (this) recebe o repositório tipo MailSenderRepository
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
		// Usa o método enviaEmailExperienciaCandidatoInscricaoCancelada do mailSenderRepository para enviar o email
		$this->mailSenderRepository->enviaEmailExperienciaCandidatoInscricaoCancelada($event->Inscricao);
	}

}
