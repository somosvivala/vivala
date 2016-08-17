<?php namespace App\Handlers\Events\Experiencias\Plataforma;

use App\Events\Experiencias\NovaPropostaExperiencia;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaNovaProposta
{
	// Cria instância de mailSenderRepository para ser usada aqui
	private $MailSenderRepository;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  NovaPropostaExperiencia  $event
	 * @return void
	 */
	public function handle(NovaPropostaExperiencia $event)
	{
		//
	}

}
