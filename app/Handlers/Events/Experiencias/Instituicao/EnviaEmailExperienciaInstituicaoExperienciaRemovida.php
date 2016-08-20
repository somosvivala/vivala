<?php namespace App\Handlers\Events\Experiencias\Instituicao;

use App\Events\Experiencias\ExperienciaRemovida;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaInstituicaoExperienciaRemovida {

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
	 * @param  ExperienciaRemovida  $event
	 * @return void
	 */
	public function handle(ExperienciaRemovida $event)
	{
		//
	}

}
