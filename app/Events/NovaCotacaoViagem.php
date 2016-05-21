<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
//use App\CotacoesViagens;

class NovaCotacaoViagem extends Event {

	use SerializesModels;

	//Declarando as propriedades do evento
	public $CotacaoViagem;

	/**
	 * Create a new event instance.
	 * @param $CotacaoViagem - Typehinting para garantir consistencia dos dados
	 * @return void
	 */
	public function __construct($CotacaoViagem)
	{
		$this->CotacaoViagem = $CotacaoViagem;
	}

}
