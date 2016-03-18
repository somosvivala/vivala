<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CompraClickbusPoltrona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compras_clickbus_poltronas';

    //Settando colunas que podem ser MassAssigned
    //AKA CompraClickBusPoltrona::create(['coluna' => 'valor']);
    protected $fillable = [
        'seat_number',
        'passenger_name',
        'passenger_document_type',
        'passenger_document_number',
        'passenger_email',
        'departure_waypoint_id',
        'arrival_waypoint_id',
        'departure_time',
        'arrival_time',
        'subtotal',
        'compra_id',
    ];

    /**
     * Toda poltrona pertence a uma compra
     */
    public function compra()
    {
        return $this->belongsTo("App\CompraClickBus");
    }
}
