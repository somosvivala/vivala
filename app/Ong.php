<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interesse;

class Ong extends Model {
    
	protected $fillable = ['nome', 'user_id', 'apelido'];


	/**
	 * Uma ONG pertence a um usuário.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

    /**
     * Uma ONG tem uma prettyUrl.
     * @return [type] [description]
     */
    public function prettyUrl()
    {
		return $this->morphMany('App\PrettyUrl', 'prettyurlable');
    }

    /**
     * Relação que representa todos os posts que a Ong deu like
     * @return [type] [description]
     */
	public function likePost()
	{
		return $this->belongsToMany('App\Post', 'entidade_like_post', 'ong_id', 'post_id')->withTimestamps();
	}

    /**
     * Uma Ong pode ter varios posts
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'author', 'author_type', 'author_id');
    }

	/**
	 * Retorna a pretty Url
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUrl()
	{
		if($this->prettyUrl()->first())
			return $this->prettyUrl()->first()->url;
		else
			return "ong/".$this->id;
	}
   
    /**
     * Accessor para a propriedade avatar
     */
    public function getAvatarAttribute() 
    {
        return $this->fotoAvatar();
    }

    /**
     * Uma Ong tem varias fotos.
     */
    public function fotos()
    {
        return $this->morphMany('App\Foto', 'owner', 'owner_type', 'owner_id');
    }

    /**
     * Uma Ong tem apenas uma foto de avatar;
     */
    public function fotoAvatar()
    {
        return $this->fotos()->where('tipo', 'avatar')->get()->first();
    }

    /**
     * Metodo para recuperar a url do avatar da ong
     * @return String 
     */
    public function getAvatarUrl() 
    {
        if ($this->fotoAvatar()) {
            return $this->fotoAvatar()->path;
        }

        return '';
    }

    /**
     * Uma Ong pode ter varios albums
     */
    public function albums()
    {
        return $this->morphMany('App\Album', 'owner', 'owner_type', 'owner_id');
    }

    /**
     * Uma Ong pode ter varios comentarios
     */
    public function comentarios() 
    {
        return $this->morphMany('App\Comentario', 'author', 'author_type', 'author_id');
    }

    /**
     * Relacao de seguir perfils
     */
    public function followPerfil()
    {
        return $this->belongsToMany('App\Perfil', 'ong_follow_perfil', 'ong_seguidor_id', 'perfil_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de seguir empresas
     */
    public function followEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'ong_follow_empresa', 'ong_seguidor_id', 'empresa_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de seguir ongs
     */
    public function followOng()
    {
        return $this->belongsToMany('App\Ong', 'ong_follow_ong', 'ong_seguidor_id', 'ong_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por perfils
     */
    public function followedByPerfil()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_ong', 'ong_seguido_id', 'perfil_seguidor_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por ongs
     */
    public function followedByOng()
    {
        return $this->belongsToMany('App\Ong', 'ong_follow_ong', 'ong_seguido_id', 'ong_seguidor_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por empresas
     */
    public function followedByEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'empresa_follow_ong', 'ong_seguido_id', 'empresa_seguidor_id')->withTimestamps();
    }

    /**
     * Retorna se já está seguindo a entidade de tipo $tipo com esse $id
     * @param  Integer    $id       Id da entidade
     * @param  Integer    $tipo     tipo da entidade
     * @return boolean
     */
    public function isFollowing($id, $tipo) 
    {
        switch ($tipo) {
            case 'App\Perfil':
                return ($this->followPerfil()->find($id) ? true : false);
                break;
            
            case 'App\Ong':
                return ($this->followOng()->find($id) ? true : false);
                break;
            
            case 'App\Empresa':
                return ($this->followEmpresa()->find($id) ? true : false);
                break;
            
            default:
                return null;
                break;
        }
        return null;
    }

    /**
     * Acessor para a propriedade followedBy, que retorna uma lista com 
     * todas as entidades que seguem essa Ong
     * @return Collection <Perfil|Ong|Empresa>
     */
    public function getFollowedByAttribute() 
    {
        //Obtendo listas de entidades que seguem essa Ong
        $listaPerfils = $this->followedByPerfil->toArray();
        $listaEmpresas = $this->followedByEmpresa->toArray();
        $listaOngs = $this->followedByOng->toArray();
        
        //mergeando listas em um unico array
        $listaSeguidores =  array_merge_recursive($listaPerfils, $listaOngs);
        $listaSeguidores =  array_merge_recursive($listaSeguidores, $listaEmpresas);
        return $listaSeguidores;
    }

    /**
     * Acessor para a propriedade following que retorna uma lista com 
     * todas as entidades que seguem essa Ong
     * @return Collection <Perfil|Ong|Empresa>
     */
    public function getFollowingAttribute() 
    {
        //Obtendo listas de entidades essa Ong segue
        $listaPerfils = $this->followPerfil->toArray();
        $listaEmpresas = $this->followEmpresa->toArray();
        $listaOngs = $this->followOng->toArray();

        //mergeando as listas em um unico array
        $listaSeguidos =  array_merge_recursive($listaPerfils, $listaOngs);
        $listaSeguidos =  array_merge_recursive($listaSeguidos, $listaEmpresas);
        return $listaSeguidos;
    }


   /**
     * Retorna sugestoes de ongs que o usuario nao esteja seguindo.
     * @param  Perfil|Ong|Empresa        $entidadeAtiva 
     * @return Collection  Collection de ongs para sugestao
     */
    public static function getSugestoes($entidadeAtiva) 
    {
        //ongs que nao sejam minhas
        $result = Ong::whereNotIn('user_id', [$entidadeAtiva->id])
            //ongs que eu nao esteja seguindo
            ->whereNotIn('id', $entidadeAtiva->followOng()->lists('id'))
            ->limit(3)
            ->get();

        return $result;
    }

    public static function interesses() {
        return Interesse::where('id', '>', '0');
    }

}
