<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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
     * @return [type] [description]
     */
    public function prettyUrl()
    {
		return $this->morphMany('App\PrettyUrl', 'prettyurlable');
    }


}
