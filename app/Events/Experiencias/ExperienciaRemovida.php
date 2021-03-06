<?php namespace App\Events\Experiencias;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\Experiencia;

class ExperienciaRemovida extends Event
{
	use SerializesModels;

  //Informações que o evento precisa propagar
	public $Experiencia;

	/**
	* Create a new event instance.
	*
	* @param $Experiencia - Experiencia que foi removida
	* @return void
	*/
	public function __construct(Experiencia $experiencia)
	{
		$this->Experiencia = $experiencia;
	}

}
