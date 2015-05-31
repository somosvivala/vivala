<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ong extends Model {

	protected $fillable = ['stri_nome_ongs'];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
