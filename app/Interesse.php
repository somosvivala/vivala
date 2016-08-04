<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model {

	protected $fillable = ['nome'];

	/**
	 * Um interesse pertende a um perfil.
	 */
	public function perfil() {
		return $this->belongsToMany('App\Perfil', 'interesse_perfil')->withTimestamps();
	}


        /**
         * Acessor para a proprieadade nomeTraduzido, que aplica o translate no 
         * valor antes de devolvelo.
         */
        public function getNomeTraduzidoAttribute() {
            return trans($this->nome);
        }
}
