<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model {

	protected $fillable = ['nome'];

	/**
	 * Um interesse pertende a um perfil.
	 */
	public function perfil() {
		return $this->belongsToMany('App\Perfil', 'interesse_perfil')->withTimestamps();
	}
}
	