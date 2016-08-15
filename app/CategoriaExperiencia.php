<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaExperiencia extends Model {

    protected $fillable = [
      'nome',
      'icone'
    ];


    /*
     * ### Relações entre as entidades ###
     */

    /**
     * Uma CategoriaExperiencia pertence a muitas Experiencias
     */
    public function experiencias()
    {
        return $this->belongsToMany('App\Experiencia');
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
