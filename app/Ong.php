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
}
