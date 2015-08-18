<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model {

	protected $fillable = [
		'nome',
		'valor'
	];
}