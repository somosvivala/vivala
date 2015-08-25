<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {


	protected $fillable = ['aniversario', 'cidade_natal', 'ultimo_local', 'foto' ];
	protected $dates = ['aniversario'];


	public function getNomeAttribute()
	{
		return $this->nome_completo;
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

    /**
     * Relacao de seguir perfils
     */
	public function followPerfil()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_perfil', 'perfil_seguidor_id', 'perfil_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de seguir empresas
     */
    public function followEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'perfil_follow_empresa', 'perfil_seguidor_id', 'empresa_seguido_id')->withTimestamps();
    }

    /**
     * Relacao de seguir ongs
     */
    public function followOng()
    {
        return $this->belongsToMany('App\Ong', 'perfil_follow_ong', 'perfil_seguidor_id', 'ong_seguido_id')->withTimestamps();
    }


    /**
     * Relacao de ser seguido por perfils
     */
    public function followedByPerfil()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_perfil', 'perfil_seguido_id', 'perfil_seguidor_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por ongs
     */
    public function followedByOng()
    {
        return $this->belongsToMany('App\Ong', 'ong_follow_perfil', 'perfil_seguido_id', 'ong_seguidor_id')->withTimestamps();
    }

    /**
     * Relacao de ser seguido por empresas
     */
    public function followedByEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'empresa_follow_perfil', 'perfil_seguido_id', 'empresa_seguidor_id')->withTimestamps();
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
     * Acessor para a propriedade FollowedBy, que retorna uma lista com 
     * todas as entidades que seguem esse Perfil
     * @return Collection  <Perfil|Ong|Empresa>
     */
    public function getFollowedByAttribute() {
        $listaPerfils = $this->followedByPerfil;
        $listaEmpresas = $this->followedByEmpresa;
        $listaOngs = $this->followedByOng;
        
        $listaEmpresas->each(function ($item, $key) {
            $listaPerfils->push($item);
        });

        $listaOngs->each(function ($item, $key) {
            $listaPerfils->push($item);
        });

        return $listaPerfils;
    }

    /**
     * Acessor para a propriedade following que retorna uma lista com 
     * todas as entidades que seguem esse Perfil
     * @return Collection  <Perfil|Ong|Empresa>
     */
    public function getFollowingAttribute() {
        $listaPerfils = $this->followPerfil;
        $listaEmpresas = $this->followEmpresa;
        $listaOngs = $this->followOng;

        $collection = $listaPerfils;

        // $collection = $listaPerfils->each(function($item) {
            
        // });


        // return ->merge($listaOngs);
        // return $listaPerfils;
        return $collection;

    }



    /**
     * Um Perfil tem uma prettyUrl.
     * @return [type] [description]
     */
    public function prettyUrl()
    {
        return $this->morphMany('App\PrettyUrl', 'prettyurlable');
    }

    /**
     * Um Perfil pode ter varios posts
     */
    public function posts()
    {
        return $this->morphMany('App\Post', 'author', 'author_type', 'author_id');
    }

	public function likePost()
	{
		return $this->belongsToMany('App\Post', 'entidade_like_post', 'perfil_id', 'post_id')->withTimestamps();
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
            return "perfil/".$this->id;
    }

    /**
     * Retorna sugestoes de perfils que já o usuario ja nao esteja seguindo.
     * @return Collection  Collection de perfils para sugestao
     */
    public static function getSugestoes($entidadeAtiva) {

        //perfils que nao tenham meu ID
        $result = Perfil::whereNotIn('id', [$entidadeAtiva->id])
            //perfils que eu nao esteja seguindo
            ->whereNotIn('id', $entidadeAtiva->followPerfil()->lists('id'))
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
     * Um Perfil tem varias fotos.
     */
    public function fotos()
    {
        return $this->morphMany('App\Foto', 'owner', 'owner_type', 'owner_id');
    }

    /**
     * Um Perfil tem apenas uma foto de avatar;
     */
    public function fotoAvatar()
    {
        return $this->fotos()->where('tipo', 'avatar')->get()->first();
    }

    /**
     * Metodo para recuperar a url do avatar do perfil
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
     * Um Perfil pode ter varios albums
     */
    public function albums()
    {
        return $this->morphMany('App\Album', 'owner', 'owner_type', 'owner_id');
    }


    /**
     * Um Perfil pode ter varios comentarios
     */
    public function comentarios() 
    {
        return $this->morphMany('App\Comentario', 'author', 'author_type', 'author_id');
    }


    /**
     * Um perfil pode dar varios likes em comentarios
     */
    public function likeComentario()
    {
        return $this->belongsToMany('App\Post', 'entidade_like_comentario', 'perfil_id', 'comentario_id')->withTimestamps();
    }


    /**
     * Um Perfil tem muitos Interesses
     */
    public function interesses() 
    {
        return $this->belongsToMany('App\Interesse', 'interesse_perfil')->withTimestamps();
    }




    





}
