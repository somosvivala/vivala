<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Auth;
use App;

class Post extends Model {

	//mass assigned fields
	protected $fillable = [
		'titulo',
		'descricao',
		'foto',
		'video',
		'tipo_post'
	];


	// Definindo a propriedades que nao existem no bd
	public function getDataPostagemDiffMiniAttribute()
	{
		$date = new Date($this->created_at);
		$date->setLocale(App::getLocale());
		return $date->diffInSeconds();
	}

	// Definindo a propriedades que nao existem no bd
	public function getDataPostagemDiffAttribute()
	{
		$date = new Date($this->created_at);
		$date->setLocale(App::getLocale());
		return $date->diffForHumans();
	}

	public function getQuantidadeLikes()
	{
		$qtdPerfil = count($this->likedByPerfil->toArray());
		$qtdEmpresa = count($this->likedByEmpresa->toArray());
		$qtdOng = count($this->likedByOng->toArray());
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
	 * Um Post pode ser feito por varias entidades
	 */
	public function author() {
		return $this->morphTo();
	}

	/**
	 * @return Accessor para a relacao author
	 */
	public function getEntidadeAttribute()
	{
		return $this->author;
	}

	/**
	 * Retorna os posts ordenados por data ignorando a relevancia e os
         * followers
	 */
	static public function getUltimos()
	{
		return Post::latest()->get();
	}

	/**
	 * Retorna os posts ordenados por relevancia
	 */
	public static function getMaisrelevantes()
	{

            $seguidores = Auth::user()->entidadeAtiva->followPerfil;

            $posts = Post::where(function ($query)  {
                $query->where('author_id','=',Auth::user()->perfil->id)->where('author_type','=','App\Perfil');
            });
            $seguidores_sugestao = explode(',',env('ADMINS_ID','1'));

            // pega os posts dos sugeridos
            foreach($seguidores_sugestao as $id_perfil)
            {
                $posts = $posts->orWhere(function ($query) use ($id_perfil) {
                    $query->where('author_id','=',$id_perfil)->where('author_type','=','App\Perfil');
                });
            }

            // pega os posts dos seus folowers
            foreach($seguidores as $fperfil)
            {
                $posts = $posts->orWhere(function ($query) use ($fperfil) {
                    $query->where('author_id','=',$fperfil->id)->where('author_type','=','App\Perfil');
                });
            }

            $posts = $posts->orderBy('relevancia','DESC')->get()->keyBy('id');

            return $posts;
        }



        /**
         * Um Post tem uma foto.
         */
        public function fotos()
        {
            return $this->morphOne('App\Foto', 'owner', 'owner_type', 'owner_id');
        }

        /**
         * Um Post pode ter varios albums
         * @return [type] [description]
         */
        public function albums()
        {
        return $this->morphMany('App\Album', 'owner', 'owner_type', 'owner_id');
    }


    /**
     * Um Post pode ter muitos Comentarios
     * @return [type] [description]
     */
    public function comentarios() {
    	return $this->hasMany('App\Comentario');
    }


    /**
     * Retorna todos os comentarios ordenados do mais recente para o mais antigo
     * @return Collection
     */
    public function comentariosByDate() {
    	return $this->comentarios()->orderBy('created_at', 'DESC')->get();
    }

		/**
     * Retorna os ultimos 2 comentarios ordenados do mais recente para o mais antigo
     * @return Collection
     */
    public function novosComentariosByDate($qtd = 2) {
    	return $this->comentarios()->orderBy('created_at', 'DESC')->limit($qtd)->get();
    }

		/**
     * Retorna os ultimos 2 comentarios ordenados do mais recente para o mais antigo
     * @return Collection
     */
    public function getNovoscomentariosbydate($qtd) {
    	return $this->comentarios()->orderBy('created_at', 'DESC')->limit($qtd)->get();
    }

    /**
     * Acessor para a propriedade url
     * @return [type] [description]
     */
    public function getUrlAttribute()
    {
    	return "/post/".$this->id;
    }


}
