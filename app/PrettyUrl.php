<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PrettyUrl extends Model {

	//mass assigned fields
	protected $fillable = [
		'str_url_prettyUrls',
		'enum_tipo_prettyUrls'
	];

	public function perfil()
	{
		return $this->belongsTo('App\Perfil');
	}
}
