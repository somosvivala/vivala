<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PrettyUrl extends Model {

	//mass assigned fields
	protected $fillable = [
		'url',
		'tipo'
	];


	/**
	 * A prettyUrl pertence a um perfil. 
	 * todo: e quanto as paginas (ongs/empresas?)
	 * @return [type] [description]
	 */
	public function perfil()
	{
		return $this->belongsTo('App\Perfil');
	}
}
