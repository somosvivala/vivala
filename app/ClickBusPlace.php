<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClickBusPlace extends Model {

	protected $table = 'ClickBusPlaces';

    /**
     * Um local pode ser embarque de muitas passagens(poltronas)
     */
    public function passagensEmbarque()
    {
        return $this->hasMany("App\CompraClickbusPoltrona", 'departure_id');
    }

    /**
     * Um local pode ser desembarque de muitas passagens(poltronas)
     */
    public function passagensDesembarque()
    {
        return $this->hasMany("App\CompraClickbusPoltrona", 'arrival_id');
    }


    /**
     * Acessor para todas as passagens de um local (embarque e desembarque)
     */
    public function getPassagensAttribute()
    {
       return $this->passagensEmbarque->merge($this->passagensDesembarque);
    }
}
