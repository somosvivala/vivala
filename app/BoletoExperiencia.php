<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletoExperiencia extends Model
{

    protected $fillable = [
        'data_emissao',
        'data_vencimento',
        'valor',
        'boleto_sequencial',
        'boleto_pagador_nome',
        'boleto_pagador_cprf',
        'boleto_pagador_endereco_cep',
        'boleto_pagador_endereco_uf',
        'boleto_pagador_endereco_localidade',
        'boleto_pagador_endereco_bairro',
        'boleto_pagador_endereco_logradouro',
        'boleto_pagador_endereco_numero',
        'boleto_pagador_endereco_complemento'
    ];


}
