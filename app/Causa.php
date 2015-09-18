<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Causa extends Model {

	//mass assigned fields
	protected $fillable = [
		'titulo',
		'descricao',
		'habilidades',
		'sobre_trabalho',
		'local',
		'perfil_id'
		];	

	/**
	 * Estabelece a relaçao entre a entidade causa e a entidade Perfil,
	 * uma causa pertende a uma Perfil.
	 */
	public function responsavel() {
		return $this->belongsTo('App\Perfil');
	}

	/**
	 * Estabelece a relaçao entre a entidade causa e a entidade Perfil,
	 * uma causa tem muitos voluntarios do tipo Perfil.
	 */
	public function voluntarios() {
		return $this->hasMany('App\Perfil');
	}


	public function owner() {
		return $this->morphTo();
	}




}
