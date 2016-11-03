<?php namespace App\Events\Experiencias;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use App\InscricaoExperiencia;

class InscricaoExperienciaCancelada extends Event
{
	use SerializesModels;

	//Informações que o evento precisa propagar
  	public $Inscricao;

	/**
	* Create a new event instance.
	*
	* @param $Inscricao - Inscricao que foi cancelada (Experiencia x Usuario)
	* @return void
	*/
	public function __construct(InscricaoExperiencia $inscricao)
	{
		$this->Inscricao = $inscricao;
	}

}
