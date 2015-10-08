<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaVaga extends Model {

	protected $fillable = ['nome', 'descricao'];

	public function vagas() {
		return $this->hasMany('App\Vaga');
	}

}
