<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {

	//
	protected $fillable = ['nome', 'sigla'];

	/**
	 * Estabelece a relaçao entre a entidade estado e a entidade cidade,
	 * um estado tem muitas cidades.
	 */
	public function cidades() {
		return $this->hasMany('App\Cidade');
	}


}
