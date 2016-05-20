<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
//use App\CotacaoViagem;

class NovaCotacaoViagem extends Event {

	use SerializesModels;

	public $CotacaoViagem;

	/**
	 * Create a new event instance.
	 * @param $CotacaoViagem - Typehinting para garantir consistencia dos dados
	 * @return void
	 */
	public function __construct(CotacaoViagem $CotacaoViagem)
	{
		$this->CotacaoViagem = $CotacaoViagem;
	}

}
