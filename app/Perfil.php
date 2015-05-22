<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

	//
	protected $fillable = ['stri_aniversario', 'stri_cidade_natal', 'stri_ultimo_local'];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
