<?php namespace App\Handlers\Events\Experiencias\Candidato;

use App\Events\Experiencias\ExperienciaAconteceuRecentemente;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaCandidatoExperienciaAconteceuRecentemente
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
		//
	}

	/**
	* Handle the event.
	*
	* @param  ExperienciaAconteceuRecentemente  $event
	* @return void
	*/
	public function handle(ExperienciaAconteceuRecentemente $event)
	{
		//
	}

}
