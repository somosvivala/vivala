<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {

	protected $fillable = ['nome'];

	/**
	 * Estabelece a relaçao entre a entidade cidade e a entidade estado,
	 * uma cidade pertende a um estado.
	 */
	public function estado() {
		return $this->belongsTo('App\Estado');
	}
}
