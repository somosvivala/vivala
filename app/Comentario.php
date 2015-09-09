<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comentario extends Model {

	protected $fillable = ['conteudo'];

	/**
	 * Um Comentario pode ser feito por varias entidades 
	 */
	public function author() {
		return $this->morphTo();
	}

	/**
	 * Um Comentario sempre pertence a um Post
	 */
	public function post() {
		return $this->belongsTo('App\Post');
	}

	/**
	 * @return Quantidade de Likes
	 */
	public function getQuantidadeLikes()
	{
		$qtdPerfil = count($this->likedByPerfil);
		$qtdEmpresa = count($this->likedByEmpresa);
		$qtdOng = count($this->likedByOng);
		$qtdTotal = $qtdPerfil + $qtdEmpresa + $qtdOng;
		return $qtdTotal;
	}

	public function likedByMe()
	{
		$user = Auth::user();
		$perfil = $user->perfil;
		if( $this->likedByPerfil->find($perfil->id) ){
			return 'liked';
		} else {
			return '';
		}
	}

	public function likedByPerfil()
	{
		return $this->belongsToMany('App\Perfil', 'entidade_like_comentario', 'comentario_id', 'perfil_id')->withTimestamps();
	}

	public function likedByEmpresa()
	{
		return $this->belongsToMany('App\Empresa', 'entidade_like_comentario', 'comentario_id', 'empresa_id')->withTimestamps();
	}

	public function likedByOng()
	{
		return $this->belongsToMany('App\Ong', 'entidade_like_comentario', 'comentario_id', 'ong_id')->withTimestamps();
	}

}
