<?php namespace App\Handlers\Events\Experiencias\Candidato;

use App\Events\Experiencias\InscricaoExperienciaCancelada;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EnviaEmailExperienciaCandidatoInscricaoCancelada {

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
