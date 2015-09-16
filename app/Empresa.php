<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PrettyUrl;
use App\Interesse;
use Illuminate\Database\Eloquent\Collection;
use DB;


class Empresa extends Model {

    protected $fillable = ['nome', 'user_id', 'apelido'];


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
		return $this->morphOne('App\PrettyUrl', 'prettyurlable');
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
     * Um Empresa pode dar varios likes em comentarios
     */
    public function likeComentario()
    {
        return $this->belongsToMany('App\Comentario', 'entidade_like_comentario', 'empresa_id', 'comentario_id')->withTimestamps();
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
     * Retorna sugestoes de empresas que o usuario nao esteja seguindo.
     * @param  User 	   $entidadeAtiva 
     * @return Collection  Collection de empresas para sugestao
     */
    public static function getSugestoes($entidadeAtiva) {

        //empresas que nao sejam minhas
        $result = Empresa::whereNotIn('user_id', [$entidadeAtiva->user->id])
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

        return '/img/nophoto.png';
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


    public static function interesses() {
        return Interesse::where('id', '>', '0');
    }

    /**
     * Acessor para a propriedade numeroSeguidores da entidade.
     * @return  O numero de entidades que seguem essa entidade[
     */
    public function getNumeroSeguidoresAttribute() {
        $seguidores = $this->followedBy;
        return count($seguidores);
    }

    /**
     * Retorna uma Collection de Empresas ordenadas por numero de seguidores
     * @return Collection
     */
    public static function getMaisSeguidos($entidadeAtiva) {
        $maisSeguidosByPerfils = DB::select('
            SELECT empresa_seguido_id, COUNT(empresa_seguido_id) AS quantidade 
            FROM perfil_follow_empresa
            GROUP BY empresa_seguido_id 
            ORDER BY quantidade DESC
            LIMIT 30
            ');

        $maisSeguidosByOngs = DB::select('
            SELECT empresa_seguido_id, COUNT(empresa_seguido_id) AS quantidade 
            FROM ong_follow_empresa
            GROUP BY empresa_seguido_id 
            ORDER BY quantidade DESC
            LIMIT 30
            ');

        $maisSeguidosByEmpresas = DB::select('
            SELECT empresa_seguido_id, COUNT(empresa_seguido_id) AS quantidade 
            FROM empresa_follow_empresa 
            GROUP BY empresa_seguido_id 
            ORDER BY quantidade DESC
            LIMIT 30
            ');

        //Collections contendo objetos com empresa_seguido_id e quantidade
        $colPerfils = Collection::make($maisSeguidosByPerfils);
        $colOngs = Collection::make($maisSeguidosByOngs);
        $colEmpresas = Collection::make($maisSeguidosByEmpresas);

        // arrays contendo os ids das empresas com mais seguidores
        $listaPerfils = $colPerfils->lists('empresa_seguido_id');
        $listaOngs  = $colOngs->lists('empresa_seguido_id');
        $listaEmpresas = $colEmpresas->lists('empresa_seguido_id');

        //Juntando os ids em um unico array e eliminando ids duplicados
        $listaTodos = array_merge(array_merge($listaPerfils, $listaOngs), $listaEmpresas);
        $listaIds = array_unique($listaTodos);
        $listaIdSeguidos = Collection::make($entidadeAtiva->following);

        if (count($listaIdSeguidos)) 
        {
            //pegando lista de ids para fazer diff e nao recomendar ids que eu ja sigo
            $listaIdSeguidos = $listaIdSeguidos->lists('id');
            $listaIdSeguidos[] = $entidadeAtiva->id;
            
            //fazendo diff dos ids que ja sigo
            $listaIds = array_diff($listaIds, $listaIdSeguidos);
        }

        //Pegando collection de Empresas com todos as empresas mais seguidos
        $colSugestoes = Empresa::whereIn('id',$listaIds)->get();

        //Iterando sob o array de ids de empresas mais seguidos
        foreach ($listaIds as $id) {
            $totalSeguidores = 0;

            //Pegando objetos com campo quantidade de seguidores
            $obj1 = $colPerfils->keyBy('empresa_seguido_id')->get($id);
            $obj2 = $colOngs->keyBy('empresa_seguido_id')->get($id);
            $obj3 = $colEmpresas->keyBy('empresa_seguido_id')->get($id);

            //Testando se essas ongs tem seguidores dos tipos Perfil,Ong.Empresa
            if($obj1)   $totalSeguidores += $obj1->quantidade;
            if($obj2)   $totalSeguidores += $obj2->quantidade;
            if($obj3)   $totalSeguidores += $obj3->quantidade;

            //Adicionando numeroTotal de seguidores a empresa com $id
            $empresa = $colSugestoes->find($id);
            if ($empresa) {
                $empresa->quantidadeSeguidores = $totalSeguidores;
            }
        }

        $colSugestoes = $colSugestoes->sortBy(function($item) 
        {
            return $item->quantidadeSeguidores;
        })->reverse();

        return $colSugestoes;
    }

    /**
     * Um Perfil é alvo de varias notificacoes.
     */
    public function notificacoes()
    {
        return $this->morphMany('App\Notificacao', 'target', 'target_type', 'target_id');
    }

    /**
     * Um Perfil pode gerar varias notificacoes.
     */
    public function fromNotificacoes()
    {
        return $this->morphMany('App\Notificacao', 'from', 'from_type', 'from_id');
    }

    /**
     * Acessor para as ultimas notificacoes dessa entidade
     * @return Collection de Notificacoes
     */
    public function getUltimasNotificacoesAttribute()
    {
        return $this->notificacoes()->latest()->get();
    }

    /**
     * Acessor para as ultimas notificacoes do tipo seguidor
     * @return Collection
     */
    public function getNotificacoesFollowAttribute() 
    {
        return $this->notificacoes()->where('tipo_notificacao', 'seguidor')->latest()->get();
    }

     /**
     * Acessor para as ultimas notificacoes do tipo chat
     * @return Collection
     */
    public function getNotificacoesChatAttribute() 
    {
        return $this->notificacoes()->where('tipo_notificacao', 'chat')->latest()->get();
    }

    /**
     * Acessor para as ultimas notificacoes do tipo 'warning', na verdade todos tipos menos seguidor e chat
     * @return Collection
     */
    public function getNotificacoesWarningAttribute() 
    {
        return $this->notificacoes()->whereNotIn('tipo_notificacao', ['seguidor', 'chat'])->latest()->get();
    }


}