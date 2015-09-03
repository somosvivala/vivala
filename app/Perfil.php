<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;


class Perfil extends Model {

	protected $fillable = ['aniversario', 'cidade_natal', 'ultimo_local', 'foto', 'apelido' ];
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
    public function getFollowedByAttribute() 
    {
        //Obtendo listas de entidades que seguem esse perfil
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
     * todas as entidades que seguem esse Perfil
     * @return Collection  <Perfil|Ong|Empresa>
     */
    public function getFollowingAttribute() 
    {
        //Obtendo listas de entidades esse perfil segue
        $listaPerfils = $this->followPerfil->toArray();
        $listaEmpresas = $this->followEmpresa->toArray();
        $listaOngs = $this->followOng->toArray();

        //mergeando as listas em um unico array
        $listaSeguidos =  array_merge_recursive($listaPerfils, $listaOngs);
        $listaSeguidos =  array_merge_recursive($listaSeguidos, $listaEmpresas);

        return $listaSeguidos;
    }


    /**
     * Um Perfil tem uma prettyUrl.
     * @return [type] [description]
     */
    public function prettyUrl()
    {
        return $this->morphOne('App\PrettyUrl', 'prettyurlable');
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
     * Retorna sugestoes de perfils que já oa entidadeAtiva ja nao esteja seguindo.
     * @param  Perfil|Ong|Empresa  		$entidadeAtiva 
     * @param  integer 					$minSugestoes
     * @param  integer 					$maxSugestoes
     * @return Collection  Collection de perfils para sugestao
     */
    public static function getSugestoes($entidadeAtiva, $minSugestoes = 3, $maxSugestoes = 3) 
    {
    	//Obtendo um array de Collections de Perfils que tem interesses em comum
		$arrayCollectionPerfil = $entidadeAtiva->interesses()->with('perfil')->get()->lists('perfil');
		
		//Obtendo um array de ids dos perfils que já sigo
		$notAllowed_ids  = $entidadeAtiva->followPerfil()->lists('id');
		
		//Adicionando o meu $perfil->id para a lista de ids nao permitidos
		array_push($notAllowed_ids, $entidadeAtiva->id);
		$sugestoes = Collection::make();

		//Iterando sob o array de collections e mergeando as collections em uma collection final
		//TODO: melhorar isso Collection::flat?
		foreach ($arrayCollectionPerfil as $key => $collection) 
		{
			//Se for primeira iteração...
			if ($sugestoes->isEmpty()) {
				$sugestoes = $collection;
			} else {
				$sugestoes = $sugestoes->merge($collection);
			}
		}

		//pegando lista de ids de perfils com interesses em comum
		$arraySugestoes = $sugestoes->lists('id');

		//Removendo lista de ids nao permitidos da lista de sugestoes
		$arrayFinal = array_diff($arraySugestoes, $notAllowed_ids);
		$totalSugestoes = count($arrayFinal);

		//Criando uma Collection $extra, que ira conter sugestoes extras caso numero de 
		//sugestoes insuficiente
		$extras = Collection::make();
		if ($totalSugestoes < $minSugestoes) 
		{
			$diferença = $minSugestoes - $totalSugestoes;
			
			//Obtendo lista de ids que nao quero, (todos que ja me sugeriram + todos que nao posso seguir)
			$merged = array_merge_recursive($notAllowed_ids, $arraySugestoes);
			$notAllowed_ids = array_unique($merged);
			
			//Pegando perfils extras para sugerir..
			$extras = Perfil::whereNotIn('id', $notAllowed_ids)->limit($diferença)->get();
		}
		
		//Pegando Collection de perfils para retornar
		$sugestaoFinal = Perfil::whereIn('id', $arrayFinal)->get()->merge($extras);
		
		//Limitando o total de elementos ao valor de $maxSugestoes ou o total da query
		$qnt = count($sugestaoFinal);
		$max =  $qnt < $maxSugestoes ? $qnt : $maxSugestoes;
		
		//Se tiver apenas 1 elemento, nao aplicar random(), pois perco a collection externa
		$sugestaoFinal = $qnt == 1 ? $sugestaoFinal : $sugestaoFinal->random($max);

        return $sugestaoFinal;
    }

    /**
     * 
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
