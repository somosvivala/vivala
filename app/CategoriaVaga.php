<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaVaga extends Model {

	protected $fillable = ['nome', 'descricao'];

	public function vagas() {
		return $this->hasMany('App\Vaga');
	}

        /**
         * Acessor para a proprieadade nomeTraduzido, que aplica o translate no 
         * valor antes de devolvelo.
         */   
        public function getNomeTraduzidoAttribute() {
            return trans($this->nome);
        }
}
