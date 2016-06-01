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
	protected = [
		'user_id',
		'cotacao_json'
	];

}
