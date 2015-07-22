<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model {

	protected $fillable = ['nome', 'descricao'];

	//Um Album tem uma relação polimorfica com as outras entidades,
	//ou seja ela pode pertencer a varias entidades diferentes
	public function owner()
	{
		 return $this->morphTo();
	}	

	//Um Album pode ter varias fotos
	public function fotos() {
		return $this->morphMany('App\Foto', 'owner', 'owner_type', 'owner_id');
	}


}
