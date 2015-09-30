<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Causa extends Model {

	//mass assigned fields
	protected $fillable = [
		'habilidades',
		'sobre_trabalho',
		'responsavel_id',
                'logradouro',
                'cep', 	
		'bairro',
		'complemento',
		'estado',
                'cidade',
                'quantidade_vagas'
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

	/**
	 * Acessor para o atributo numeroVoluntarios de Causa
	 * @return Integer    numero de voluntarios dessa Causa
	 */
	public function getNumeroVoluntariosAttribute() 
	{
	    return count($this->voluntarios);
	}


	public function podeEditarAttributte() 
	{
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		return $entidadeAtiva->tipo != 'ong' 
			? $entidadeAtiva->causas->find($this->id) != null 
			: false;
	}
}
