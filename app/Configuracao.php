<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model {

	protected $fillable = [
		'char_nome_configuracao',
		'text_valor_configuracao'
	];

}
