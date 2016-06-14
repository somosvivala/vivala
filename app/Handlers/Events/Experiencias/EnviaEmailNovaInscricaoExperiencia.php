<?php namespace App\Handlers\Events\Experiencias;

use App\Events\NovaInscricaoExperiencia;

use App\Repositories\MailSenderRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailNovaInscricaoExperiencia {

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
	 * @param  NovaInscricaoExperiencia  $event
	 * @return void
	 */
	public function handle(NovaInscricaoExperiencia $event)
	{
		// Usa o método enviaEmailNovaInscricaoExperiencia do mailSenderRepository para enviar o email 
		$this->mailSenderRepository->enviaEmailNovaInscricaoExperiencia($event);
	}

}
