<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Causa extends Model {

	//mass assigned fields
	protected $fillable = [
		'habilidades',
		'sobre_trabalho',
		'local',
		'responsavel_id'
		];	

	/**
	 * Estabelece a relaçao entre a entidade Causa e a entidade Perfil,
	 * uma Causa sempre tem um responsavel Perfil.
	 */
	public function responsavel() {
		return $this->belongsTo('App\Perfil');
	}

	/**
	 * Estabelece a relaçao entre a entidade Causa e a entidade Perfil,
	 * uma Causa tem muitos voluntarios do tipo Perfil, que podem
	 * se voluntariar em varias Causas
	 */
	public function voluntarios() {
		return $this->belongsToMany('App\Perfil');
	}

	/**
	 * Relacao polimorfica de owner,
	 * @todo Por enquanto só Ong implementa essa relaçao.      
	 */
	public function owner() {
		return $this->morphTo();
	}




}
