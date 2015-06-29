<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookData extends Model {

	
	protected $fillable = ['user_birthday', 'user_hometown', 'user_likes', 'user_location'];
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
