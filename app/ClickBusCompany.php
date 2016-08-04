<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ClickBusCompany extends Model {

	protected $table = 'ClickBusCompanies';

    /**
     * Uma viacao pode vender muitas passagens (poltronas)
     */
    public function passagens()
    {
        return $this->hasMany("App\CompraClickbusPoltrona", 'viacao_id');
    }
}
