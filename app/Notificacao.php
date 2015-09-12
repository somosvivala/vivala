<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notificacoes';
	protected $fillable = ['titulo', 'mensagem', 'tipo_notificacao', 'url', 'readed'];


	//Uma Notificacao sempre VEM DE uma entidade
	public function from()
	{
		 return $this->morphTo();
	}

	//Uma Notificacao sempre VAI PARA uma entidade
	public function target()
	{
		 return $this->morphTo();
	}
}
