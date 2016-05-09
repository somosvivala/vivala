<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InscricaoExperiencia extends Model {

    /**
     * Toda as inscricoes pertencem a uma experiencia especifica
     */
    public function experiencia()
    {
        return $this->belongsTo('App\Experiencia');
    }

    /**
     * Toda as inscricoes pertencem a um usuario especifico
     */
    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }




}
