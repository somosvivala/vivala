<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CompraClickbus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compras_clickbus';

    //Settando colunas que podem ser MassAssigned
    //AKA CompraClickBus::create(['coluna' => 'valor']);
    protected $fillable = [
        'user_id',
        'localizer',
        'data_pagamento',
        'clickbus_order_id',
        'buyer_firstname',
        'buyer_lastname',
        'buyer_email',
        'buyer_birthday',
        'buyer_document',
        'buyer_document_type',
        'buyer_phone',
        'payment_method',
        'voucher',
        'voucher_discount',
        'desconto_total',
        'taxas',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function poltronas()
    {
        return $this->hasMany('App\CompraClickbusPoltrona', 'compra_id');
    }
}
