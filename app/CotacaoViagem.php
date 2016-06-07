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

	/**
	* Settando colunas que podem ser MassAssigned
	* AKA CotacaoViagem::create(['coluna' => 'valor']);
	*/
	protected $fillable = [
		'user_id',
		'cotacao_obj'
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
