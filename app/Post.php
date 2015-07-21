<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Post extends Model {

	public static function boot()
    {
        parent::boot();

        // Setup event bindings...
		Post::creating(function($post)
		{
		    if ( $post->perfil_id )
				$post->tipoEntidade = "perfil";
		    if ( $post->empresa_id )
				$post->tipoEntidade = "empresa";
		    if ( $post->ong_id )
				$post->tipoEntidade = "ong";
			return true;
		});
    }

	//mass assigned fields
	protected $fillable = [
		'titulo',
		'descricao',
		'foto',
		'video',
		'tipoEntidade',
		'tipoPost'
	];

	// Definindo a propriedades que nao existem no bd
	public function getDataPostagemDiffAttribute()
	{
		$date = new Date($this->created_at);
		return $date->diffForHumans();
	}

	// Definindo a propriedades que nao existem no bd
	public function getQuantidadeLikes()
	{
		return 689;
	}


	public function likedByPerfil()
	{
		return $this->belongsToMany('App\Perfil', 'entidade_like_post', 'post_id', 'perfil_id')->withTimestamps();
	}

	public function likedByEmpresa()
	{
		return $this->belongsToMany('App\Empresa', 'entidade_like_post', 'post_id', 'empresa_id')->withTimestamps();
	}

	public function likedByOng()
	{
		return $this->belongsToMany('App\Ong', 'entidade_like_post', 'post_id', 'ong_id')->withTimestamps();
	}

	/**
	* Um Post pode ser feito por um usuário
	*/
	public function perfil()
	{
		return $this->belongsTo('App\Perfil');
	}

	/**
	* Um Post pode ser feito por uma empresa
	*/
	public function empresa()
	{
		return $this->belongsTo('App\Empresa');
	}

	/**
	* Um Post pode ser feito por uma ong
	*/
	public function ong()
	{
		return $this->belongsTo('App\Ong');
	}

	public function entidade()
	{
		if($this->tipoEntidade = "perfil") {
			return $this->perfil();
		}
		if($this->tipoEntidade = "empresa") {
			return $this->empresa();
		}
		if($this->tipoEntidade = "ong") {
			return $this->ong();
		}
	}

	static public function getUltimos()
	{
		return Post::latest()->get();
	}

	/**
     * Um Post tem uma foto.
     */
    public function fotos()
    {
        return $this->morphOne('App\Foto', 'owner', 'owner_type', 'owner_id');
    }

}
