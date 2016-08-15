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

    /**
     * ### Acessors (modificacoes que executarão após recuperar o campo do BD) ###
     * ### (antes de devolver) ###
     */

    /**
     * Definindo um acessor para o shortname do icone do font-awesome
     */
    public function getIconeShortNameAttribute()
    {
        return str_replace('fa ',  '', $this->icone);
    }


    /**
     * Definindo um acessor para o path publico do icone dessa categoria
     */
    public function getPathIconePNGAttribute()
    {
        return url('/public/fapng/'.$this->iconeShortName.'.png');
    }

}
