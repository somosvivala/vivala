<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use DB;

class Perfil extends Model {

	protected $fillable =
    [
        'nome_completo',
        'apelido',
        'genero',
        'aniversario',
        'cidade_natal',
        'cidade_atual',
        'ultimo_local',
        'descricao_curta',
        'descricao_longa'
    ];

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
        //fix adicionando id do perfil associado a conta dessa entidadeAtiva
		array_push($notAllowed_ids, $entidadeAtiva->user->perfil->id);
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

        return '/img/nophoto.png';
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
     * Um Perfil pode dar varios likes em comentarios
     */
    public function likeComentario()
    {
        return $this->belongsToMany('App\Comentario', 'entidade_like_comentario', 'perfil_id', 'comentario_id')->withTimestamps();
    }


    /**
     * Um Perfil tem muitos Interesses
     */
    public function interesses()
    {
        return $this->belongsToMany('App\Interesse', 'interesse_perfil')->withTimestamps();
    }


    /**
     * Acessor para a propriedade aniversario
     *
     * @param  int  $id
     * @return Response
     */
    public function getDatanascimentoAttribute()
    {
        if($this->aniversario)
            return $this->aniversario->format('d/m/Y');
        else
            return false;
    }

    /**
     * Acessor para a propriedade numeroSeguidores da entidade.
     * @return  O numero de entidades que seguem essa entidade[
     */
    public function getNumeroSeguidoresAttribute()
    {
        $seguidores = $this->followedBy;
        return count($seguidores);
    }


    /**
     * Retorna uma Collection de perfils ordenados por numero de seguidores
     * @return Collection
     */
    public static function getMaisSeguidos()
    {
        $maisSeguidosByPerfils = DB::select('
            SELECT perfil_seguido_id, COUNT(perfil_seguido_id) AS quantidade
            FROM perfil_follow_perfil
            GROUP BY perfil_seguido_id
            ORDER BY quantidade DESC
            LIMIT 30
            ');

        $maisSeguidosByOngs = DB::select('
            SELECT perfil_seguido_id, COUNT(perfil_seguido_id) AS quantidade
            FROM ong_follow_perfil
            GROUP BY perfil_seguido_id
            ORDER BY quantidade DESC
            LIMIT 30
            ');

        $maisSeguidosByEmpresas = DB::select('
            SELECT perfil_seguido_id, COUNT(perfil_seguido_id) AS quantidade
            FROM empresa_follow_perfil
            GROUP BY perfil_seguido_id
            ORDER BY quantidade DESC
            LIMIT 30
            ');

        //Collections contendo objetos com perfil_seguido_id e quantidade
        $colPerfils = Collection::make($maisSeguidosByPerfils);
        $colOngs = Collection::make($maisSeguidosByOngs);
        $colEmpresas = Collection::make($maisSeguidosByEmpresas);

        // arrays contendo os ids dos perfils com mais seguidores
        $listaPerfils = $colPerfils->lists('perfil_seguido_id');
        $listaOngs  = $colOngs->lists('perfil_seguido_id');
        $listaEmpresas = $colEmpresas->lists('perfil_seguido_id');

        //Juntando os ids em um unico array e eliminando ids duplicados
        $listaTodos = array_merge(array_merge($listaPerfils, $listaOngs), $listaEmpresas);
        $listaIds = array_unique($listaTodos);

        //Pegando collection de Perfils com todos os perfils mais seguidos
        $colSugestoes = Perfil::whereIn('id',$listaIds)->get();

        //Iterando sob o array de ids de perfils mais seguidos
        foreach ($listaIds as $id) {
            $totalSeguidores = 0;

            //Pegando objetos com campo quantidade de seguidores
            $obj1 = $colPerfils->keyBy('perfil_seguido_id')->get($id);
            $obj2 = $colOngs->keyBy('perfil_seguido_id')->get($id);
            $obj3 = $colEmpresas->keyBy('perfil_seguido_id')->get($id);

            //Testando se esses perfils tem seguidores dos tipos Perfil,Ong.Empresa
            if($obj1)   $totalSeguidores += $obj1->quantidade;
            if($obj2)   $totalSeguidores += $obj2->quantidade;
            if($obj3)   $totalSeguidores += $obj3->quantidade;

            //Adicionando numeroTotal de seguidores ao perfil com $id
            $perfil = $colSugestoes->find($id);
            if ($perfil) {
                $perfil->quantidadeSeguidores = $totalSeguidores;
            }
        }

        $colSugestoes = $colSugestoes->sortBy(function($item)
        {
            return $item->quantidadeSeguidores;
        })->reverse();

        return $colSugestoes;
    }


    /**
     * Retornas os Perfils que eu sigo e me seguem
     * @return [type] [description]
     */
    public function getAmigosAttribute()
    {
        $perfilsSeguindo   = $this->followPerfil;
        $perfilsSeguidores = $this->followedByPerfil;
        $amigos = $perfilsSeguidores->intersect($perfilsSeguindo);
        return $amigos;
    }


    /**
     * Retorna uma Collection de Perfil amigos em comum se existirem
     * @param  $id              Id do perfil em questao
     * @return  Collection de Perfil
     */
    public function getAmigosEmComum($id)
    {
        $perfil = Perfil::findOrFail($id);
        $amigos = $this->amigos;

        $amigosDessePerfil = $perfil->amigos;
        if ($amigos && $amigosDessePerfil) {
            $amigosEmComum = $amigosDessePerfil->intersect($amigos);
        }

        return $amigosEmComum;
    }

    /**
     * Get quantidade amigos com um Perfil especifico
     * @param  $id          Id do perfil em questao
     * @return Integer
     */
    public function getQuantidadeAmigosEmComum($id)
    {
        $amigos = $this->getAmigosEmComum($id);
        return $amigos ? count($amigos) : 0 ;
    }


    /**
     * Acessor para pegar uma Collection de Perfil ordenados pela quantidade de amigos em comum
     * @return Collection
     */
    public function getSugestaoByAmigosEmComumAttribute()
    {
        //Collection com toos os perfils que eu nao sigo
        $colNaoAmigos = Perfil::all()->diff($this->followPerfil)->diff([$this]);
        $amigos = $this->amigos;

        foreach ($colNaoAmigos as $key => $perfil) {

            //Se esse perfil tiver amigos, vejo se eles os amigos desse perfil
            $amigosDessePerfil = $perfil->amigos;
            if ($amigosDessePerfil) {
                $amigosEmComum = $amigosDessePerfil->intersect($amigos);
            }

            $perfilRetorno = $colNaoAmigos->find($perfil->id);
            if ($perfilRetorno) {
                $perfilRetorno->quantidadeAmigosEmComum = count($amigosEmComum);
            }
        }

        $colNaoAmigos = $colNaoAmigos->sortBy(function($item)
        {
            return $item->quantidadeAmigosEmComum;
        })->reverse();

        return $colNaoAmigos;
    }

    /**
     * Acessor para pegar uma Collection de Perfil ordenados pela quantidade de seguindo em comum
     * @return Collection
     */
    public function getSugestaoBySeguindoEmComumAttribute()
    {
        //Collection com todos os perfils que eu nao sigo
        $colNaoSeguindo = Perfil::all()->diff($this->followPerfil)->diff([$this]);
        $seguindo = $this->followPerfil;

        foreach ($colNaoSeguindo as $key => $perfil) {

            //Se esse perfil seguir outras pessoas, checo so seguindo desse perfil
            $seguindoDessePerfil = $perfil->followPerfil;
            if ($seguindoDessePerfil) {
                $seguindoEmComum = $seguindoDessePerfil->intersect($seguindo);
            }

            //Adicionando o parametro quantidadeSeguidores em comum em cada perfil da collection
            $perfilRetorno = $colNaoSeguindo->find($perfil->id);
            if ($perfilRetorno) {
                $perfilRetorno->quantidadeSeguindoEmComum = count($seguindoEmComum);
            }
        }

        //Ordenando a collection
        $colNaoSeguindo = $colNaoSeguindo->sortBy(function($item)
        {
            return $item->quantidadeSeguindoEmComum;
        })->reverse();

        return $colNaoSeguindo;
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
