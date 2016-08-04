<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InteracaoPlataforma extends Model
{

    //mass assigned fields
    protected $fillable = [
        'tipo',
        'descricao',
        'url',
        'extra'
    ];

    /**
     * Uma iteracao com a plataforma por varias entidades (ong, perfil, empresa)
     */
    public function author()
    {
        return $this->morphTo();
    }

}
