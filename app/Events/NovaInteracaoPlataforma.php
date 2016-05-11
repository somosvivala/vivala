<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class NovaInteracaoPlataforma extends Event {

	use SerializesModels;

  public $log;

	/**
	 * Create a new event instance.
   * @param $author - Ong | Perfil - entidade que cometeu a acao
   * @param $tipo - string para identificar a acao (click.barralateral.hospedagem)
   * @param $descricao - string para descrever a acao ocorrida
   * @param $url -  string para melhor identificacao
   * @param $extra - string contendo qualquer informacao extra.
	 *
	 * @return void
	 */
	public function __construct($author=null, $tipo=null, $descricao=null, $url=null, $extra=null)
	{
      $this->log = new \stdClass();
      $this->log->author = $author;
      $this->log->tipo = $tipo;
      $this->log->descricao = $descricao;
      $this->log->url = $url;
      $this->log->extra = $extra;
	}

}
