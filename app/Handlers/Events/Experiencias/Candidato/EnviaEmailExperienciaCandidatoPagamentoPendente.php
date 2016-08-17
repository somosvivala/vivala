<?php namespace App\Handlers\Events\Experiencias\Candidato;

use App\Events\Experiencias\NovaInscricaoExperiencia;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use App\InscricaoExperiencia;
use App\Repositories\MailSenderRepository;

class EnviaEmailExperienciaCandidatoPagamentoPendente
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
		// Usa o método enviaEmailExperienciaCandidatoPagamentoPendente do mailSenderRepository para enviar o email
		$this->MailSenderRepository->enviaEmailExperienciaCandidatoPagamentoPendente($event->Inscricao);
	}

}
