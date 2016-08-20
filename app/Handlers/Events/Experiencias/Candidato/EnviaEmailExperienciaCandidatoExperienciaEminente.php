<?php namespace App\Handlers\Events\Experiencias\Candidato;

use App\Events\Experiencias\ExperienciaEminente;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaCandidatoExperienciaEminente {

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
	 * @param  ExperienciaEminente  $event
	 * @return void
	 */
	public function handle(ExperienciaEminente $event)
	{
		//
	}

}
