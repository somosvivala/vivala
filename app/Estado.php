<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Estado extends Model {

	//
	protected $fillable = ['nome', 'sigla'];

	/**
	 * Estabelece a relaçao entre a entidade estado e a entidade cidade,
	 * um estado tem muitas cidades.
	 */
	public function cidades() {
		return $this->hasMany('App\Cidade');
	}


        /**
         * Acessor para a propriedade Ongs, retornando todas as ongs desse 
         * estado.
         * @return Collection
         */
        public function getOngsAttribute() {

            $collection = new Collection();
            foreach ($this->cidades as $cidade) {
                
                $ongsCidade = $cidade->ongs;

                //Se essa cidade tiver ongs
                if (count($ongsCidade) > 0) {

                    //Adicionando cada ong a Collection que sera retornada
                    foreach ($ongsCidade as $ong) {
                        $collection->add($ong);
                    } 
                    
                }
            }

            return $collection;
        }


        /**
         * Acessor para a propriedade NumeroOngs, que retorna a quantidade de 
         * Ongs desse estado.
         * @return Integer
         */
        public function getNumeroOngsAttribute()
        {
            return count($this->ongs);
        }

}
