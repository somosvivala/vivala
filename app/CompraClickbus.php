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

    /**
     * Denotando os campos dates para que o laravel sirva uma instancia do Carbon
     */
	  protected $dates = ['data_pagamento'];

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
        'buyer_document_type',
        'buyer_nome_fantasia',
        'buyer_razao_social',
        'redirect_url'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function poltronas()
    {
        return $this->hasMany('App\CompraClickbusPoltrona', 'compra_id');
    }

    /*
     * Retorna a data de pagamento formatada em dd/mm/YYYY
     */
    public function getDataConfirmacaoPagamentoAttribute()
    {
        return ($this->data_pagamento ? $this->data_pagamento->format('d/m/Y') : 'Indisponivel');
    }

    /*
     * Retorna a redirectUrl
     */
    public function getContinuarPagamentoUrlAttribute()
    {
        return $this->redirectUrl;
    }


}
