<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {

	protected $fillable = ['nome', 'posicao'];

	/**
	 * Estabelece a relaçao entre a entidade cidade e a entidade estado,
	 * uma cidade pertende a um estado.
	 */
	public function estado() {
		return $this->belongsTo('App\Estado');
	}

        
        /**
         * Cria uma relaçao entre a cidade e as Ongs, permitindo filtrar 
         * geograficamente
         */
        public function ongs()
        {
            return $this->hasMany('App\Ong');
        }


        /**
         * Acessor para a propriedade NumeroOngs, que retorna a quantidade de 
         * Ongs dessa cidade.
         * @return Integer
         */
        public function getNumeroOngsAttribute()
        {
            return count($this->ongs);
        }
}
