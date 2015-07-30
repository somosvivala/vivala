<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model {

	protected $fillable = ['conteudo'];

	/**
	 * Um Comentario pode ser feito por varias entidades 
	 */
	public function author() {
		return $this->morphTo();
	}

	/**
	 * Um Comentario sempre pertence a um Post
	 */
	public function post() {
		return $this->belongsTo('App\Post');
	}
}
