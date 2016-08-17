<?php namespace App\Handlers\Events\Experiencias;

use App\Events\Experiencias\InscricaoExperienciaCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaInstituicaoInscricaoCancelada {

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
	 * @param  InscricaoExperienciaCancelada  $event
	 * @return void
	 */
	public function handle(InscricaoExperienciaCancelada $event)
	{
		//
	}

}
