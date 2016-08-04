<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacaoExperiencia extends Model {

    protected $fillable = [
      'descricao',
      'icone'
    ];

    /**
     * Uma InformacaoExperiencia(conjunto icone:descricao)
     * pertence a uma Experiencia
     */
    public function experiencia()
    {
        return $this->belongsTo('App\Experiencia');
    }

}
