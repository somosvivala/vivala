<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClickBusPlace extends Model {

	protected $table = 'ClickBusPlaces';

    /**
     * Um local pode ser embarque de muitas passagens(poltronas)
     */
    public function embarque()
    {
        return $this->hasMany("App\CompraClickbusPoltrona", 'departure_id', 'poltrona_departure_id');
    }

    /**
     * Um local pode ser desembarque de muitas passagens(poltronas)
     */
    public function desembarque()
    {
        return $this->hasMany("App\CompraClickbusPoltrona", 'arrival_id', 'poltrona_arrival_id');
    }

}
