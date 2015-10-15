<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaOng extends Model {

	protected $fillable = ['nome', 'descricao'];

	public function ongs() {
		return $this->hasMany('App\Ong');
	}


        /**
         * Acessor para a proprieadade nomeTraduzido, que aplica o translate no 
         * valor antes de devolvelo.
         */
        public function getNomeTraduzidoAttribute() {
            return trans($this->nome);
        }
}
