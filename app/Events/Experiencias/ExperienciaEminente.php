<?php namespace App\Events\Experiencias;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class ExperienciaEminente extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}
