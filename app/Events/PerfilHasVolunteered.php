<?php namespace App\Events;

use App\Events\Event;
use App\Perfil;
use App\Vaga;
use Illuminate\Queue\SerializesModels;

class PerfilHasVolunteered extends Event {

	use SerializesModels;

    public $perfil;
    public $vaga;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Perfil $perfil, Vaga $vaga)
	{
		$this->perfil = $perfil;
		$this->vaga = $vaga;
	}

}
