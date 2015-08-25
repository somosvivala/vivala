<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PrettyUrl;

class Empresa extends Model {

	protected $fillable = ['nome'];

	/**
	 * Uma empresa pertence a um usuário.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
     * Uma Empresa tem uma prettyUrl.
     */
    public function prettyUrl()
    {
		return $this->morphMany('App\PrettyUrl', 'prettyurlable');
    }


    /**
     * Uma Empresa tem muitos Posts
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'author', 'author_type', 'author_id');
    }


    /**
     * Uma Empresa pode dar Like em muitos Posts
     * @return [type] [description]
     */
	public function likePost()
	{
		return $this->belongsToMany('App\Post', 'entidade_like_post', 'empresa_id', 'post_id')->withTimestamps();
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
		 	return "empresa/show/".$this->id;
	}

	/**
	 * Retorna todos os perfils que seguem essa Empresa
	 * @return [type] [description]
	 */
    public function followedBy()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_empresa', 'empresa_seguido_id', 'perfil_seguidor_id')->withTimestamps();
    }

    /**
     * Retorna sugestoes de empresas que o usuario nao esteja seguindo.
     * @param  User 	   $entidadeAtiva 
     * @return Collection  Collection de empresas para sugestao
     */
    public static function getSugestoes($entidadeAtiva) {

        //empresas que nao sejam minhas
        $result = Empresa::whereNotIn('user_id', [$entidadeAtiva->id])
            //empresas que eu nao esteja seguindo
            ->whereNotIn('id', $entidadeAtiva->followEmpresa()->lists('id'))
            ->limit(3)
            ->get();

        return $result;
    }


    /**
     * Accessor para a propriedade avatar
     */
    public function getAvatarAttribute() 
    {
        return $this->fotoAvatar();
    }

    /**
     * Uma Empresa tem varias fotos.
     */
    public function fotos()
    {
        return $this->morphMany('App\Foto', 'owner', 'owner_type', 'owner_id');
    }

    /**
     * Uma Empresa tem apenas uma foto de avatar;
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
     * Uma Empresa pode ter varios albums
     */
    public function albums()
    {
        return $this->morphMany('App\Album', 'owner', 'owner_type', 'owner_id');
    }

    /**
     * Um Empresa pode ter varios comentarios
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
        return $this->belongsToMany('App\Perfil', 'empresa_follow_perfil', 'empresa_seguidor_id', 'perfil_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de seguir empresas
     */
    public function followEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'empresa_follow_empresa', 'empresa_seguidor_id', 'empresa_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de seguir ongs
     */
    public function followOng()
    {
        return $this->belongsToMany('App\Ong', 'empresa_follow_ong', 'empresa_seguidor_id', 'ong_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por perfils
     */
    public function followedByPerfil()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_empresa', 'empresa_seguido_id', 'perfil_seguidor_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por ongs
     */
    public function followedByOng()
    {
        return $this->belongsToMany('App\Ong', 'ong_follow_empresa', 'empresa_seguido_id', 'ong_seguidor_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por empresas
     */
    public function followedByEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'empresa_follow_empresa', 'empresa_seguido_id', 'empresa_seguidor_id')->withTimestamps();
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
     * todas as entidades que seguem essa Empresa
     * @return Collection <Perfil|Ong|Empresa>
     */
    public function getFollowedByAttribute() 
    {
        //Obtendo listas de entidades que seguem essa Empresa
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
     * todas as entidades que seguem essa Empresa
     * @return Collection <Perfil|Ong|Empresa>
     */
    public function getFollowingAttribute() 
    {
        //Obtendo listas de entidades essa Empresa segue
        $listaPerfils = $this->followPerfil->toArray();
        $listaEmpresas = $this->followEmpresa->toArray();
        $listaOngs = $this->followOng->toArray();

        //mergeando as listas em um unico array
        $listaSeguidos =  array_merge_recursive($listaPerfils, $listaOngs);
        $listaSeguidos =  array_merge_recursive($listaSeguidos, $listaEmpresas);
        return $listaSeguidos;
    }


}
