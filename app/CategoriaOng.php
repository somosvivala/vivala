<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaOng extends Model {

	protected $fillable = ['nome', 'descricao'];

	public function ongs() {
		return $this->hasMany('App\Ong');
	}

}
