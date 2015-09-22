<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpresa extends Model {

	protected $fillable = ['nome', 'descricao'];

	public function empresas() {
		return $this->hasMany('App\Empresa');
	}

}
