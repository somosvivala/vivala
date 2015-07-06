<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

	
	protected $fillable = ['aniversario', 'cidade_natal', 'ultimo_local'];
	protected $dates = ['aniversario'];


	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function follow()
    {
        return $this->belongsToMany('App\Perfil', 'follow_perfil', 'perfil_id', 'follow_id')->withTimestamps();
    }

    public function followedBy()
    {
        return $this->belongsToMany('App\Perfil', 'follow_perfil', 'follow_id', 'perfil_id')->withTimestamps();
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


}
