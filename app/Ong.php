<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ong extends Model {

	protected $fillable = ['nome', 'user_id'];

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

	public function likePost()
	{
		return $this->belongsToMany('App\Post', 'entidade_like_post', 'ong_id', 'post_id')->withTimestamps();
	}

    /**
     * Uma Ong tem muitos Posts
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
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
	 * Retorna todos os perfils que seguem essa Ong
	 * @return [type] [description]
	 */
    public function followedBy()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_ong', 'ong_seguido_id', 'perfil_seguidor_id')->withTimestamps();
    }

   /**
     * Retorna sugestoes de ongs que o usuario nao esteja seguindo.
     * @param  User 	   $user 
     * @return Collection  Collection de ongs para sugestao
     */
    public static function getSugestoes($user) {

        //ongs que nao sejam minhas
        $result = Ong::whereNotIn('user_id', [$user->perfil->id])
            //ongs que eu nao esteja seguindo
            ->whereNotIn('id', $user->perfil->followOng()->lists('id'))
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

}
