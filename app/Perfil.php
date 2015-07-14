<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {


	protected $fillable = ['aniversario', 'cidade_natal', 'ultimo_local'];
	protected $dates = ['aniversario'];


	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function followPerfil()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_perfil', 'perfil_seguidor_id', 'perfil_seguido_id')->withTimestamps();
    }

    public function followEmpresa()
    {
        return $this->belongsToMany('App\Empresa', 'perfil_follow_empresa', 'perfil_seguidor_id', 'empresa_seguido_id')->withTimestamps();
    }

    public function followOng()
    {
        return $this->belongsToMany('App\Ong', 'perfil_follow_ong', 'perfil_seguidor_id', 'ong_seguido_id')->withTimestamps();
    }

    public function followedBy()
    {
        return $this->belongsToMany('App\Perfil', 'perfil_follow_perfil', 'perfil_seguido_id', 'perfil_seguidor_id')->withTimestamps();
    }

    /**
     * Retorna se já está seguindo o usuario com esse $id
     * @param  Integer    $id   Id do usuario
     * @return boolean    
     */
    public function isFollowing($id) {
        return ($this->followPerfil()->find($id) ? true : false);
    }

    /**
     * Um Perfl tem uma prettyUrl.
     * @return [type] [description]
     */
    public function prettyUrl()
    {
        return $this->morphMany('App\PrettyUrl', 'prettyurlable');
    }

    /**
     * Um Perfil tem muitos Posts
     * @return [type] [description]
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
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
    public static function getSugestoes($user) {

        //perfils que nao tenham meu ID
        $result = Perfil::whereNotIn('id', [$user->perfil->id])
            //perfils que eu nao esteja seguindo
            ->whereNotIn('id', $user->perfil->followPerfil()->lists('id'))
            ->limit(3)
            ->get();

        return $result;
    }




}
