<?php namespace App\Handlers\Events\Experiencias\Instituicao;

use App\Events\Experiencias\ExperienciaAconteceuRecentemente;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaInstituicaoExperienciaAconteceuRecentemente {

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
	 * @param  ExperienciaAconteceuRecentemente  $event
	 * @return void
	 */
	public function handle(ExperienciaAconteceuRecentemente $event)
	{
		//
	}

}
