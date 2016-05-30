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
	 * Denotando os campos dates para que o laravel sirva uma instancia do Carbon
	 */
	protected $dates = [''];

	/**
	* Settando colunas que podem ser MassAssigned
  * AKA CotacaoViagem::create(['coluna' => 'valor']);
	*/
	protected = [
		'user_id',
		'numero_de_adultos',
		'numero_de_criancas',
		'qtd_quartos',
		'adicionais_hotel',
		'pref_bairro_regiao'
	];



}
