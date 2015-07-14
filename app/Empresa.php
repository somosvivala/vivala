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
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
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
     * @param  User 	   $user 
     * @return Collection  Collection de empresas para sugestao
     */
    public static function getSugestoes($user) {

        //empresas que nao sejam minhas
        $result = Empresa::whereNotIn('user_id', [$user->perfil->id])
            //empresas que eu nao esteja seguindo
            ->whereNotIn('id', $user->perfil->followEmpresa()->lists('id'))
            ->limit(3)
            ->get();

        return $result;
    }


}
