<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatorioClickbus extends Model {

    protected $fillable = [
        'localizer',
        'rota_origem',
        'rota_destino',
        'buyer_firstname',
        'buyer_lastname',
        'buyer_email',
        'payment_method',
        'order_created_at',
        'order_updated_at',
        'clickbus_order_id',
        'quantidade_bilhetes',
        'status'
    ];
}
