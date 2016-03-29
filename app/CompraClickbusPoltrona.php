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

    /**
     * Denotando os campos dates para que o laravel sirva uma instancia do Carbon
     */
	  protected $dates = ['departure_time', 'arrival_time'];


    //Settando colunas que podem ser MassAssigned
    //AKA CompraClickBusPoltrona::create(['coluna' => 'valor']);
    protected $fillable = [
        'compra_id',
        'departure_id',
        'arrival_id',
        'viacao_id',
        'localizer',
        'passenger_name',
        'passenger_document_number',
        'passenger_document_type',
        'seat_number',
        'passenger_email',
        'departure_time',
        'arrival_time',
        'subtotal'
    ];

    /**
     * Toda poltrona pertence a uma compra
     */
    public function compra()
    {
        return $this->belongsTo("App\CompraClickbus");
    }

    /**
     * Toda poltrona tem um local de embarque
     */
    public function embarque()
    {
        return $this->belongsTo("App\ClickBusPlace", 'departure_id');
    }

    /**
     * Toda poltrona tem um local de desembarque
     */
    public function desembarque()
    {
        return $this->belongsTo("App\ClickBusPlace", 'arrival_id');
    }

    /**
     * Toda poltrona é oferecida por 1 viacao
     */
    public function viacao()
    {
        return $this->belongsTo("App\ClickBusCompany", 'viacao_id');
    }


    /*
     * Retorna a hora de embarque formatada em hh:mm:ss
     */
    public function getHoraEmbarqueAttribute()
    {
        return $this->departure_time->format('H:i:s');
    }

    /*
     * Retorna a data de desembarque formatada em dd/mm/YYYY
     */
    public function getDataEmbarqueAttribute()
    {
        return $this->departure_time->format('d/m/Y');
    }

    /*
     * Retorna a hora de desembarque formatada em hh:mm:ss
     */
    public function getHoraDesembarqueAttribute()
    {
        return $this->arrival_time->format('H:i:s');
    }

    /*
     * Retorna a data de desembarque formatada em dd/mm/YYYY
     */
    public function getDataDesembarqueAttribute()
    {
        return $this->arrival_time->format('d/m/Y');
    }

}
