<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CotacaoViagem extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cotacao_viagens';

	$fillable [
		'cotacao_viagem_obj'
	];

	/**
	* Settando colunas que podem ser MassAssigned
  * AKA CotacaoViagem::create(['coluna' => 'valor']);
	*/
	protected = [
		'cotacao_viagem_id',
		'cotacao_viagem_obj'
	];

	/**
	 * Estabelece a relaçao entre a entidade CotacaoViagem e a entidade Perfil,
	 * uma CotacaoViagem sempre tem um responsavel Perfil.
	 */
	public function responsavel()
	{
			return $this->belongsTo('App\Perfil');
	}

}
