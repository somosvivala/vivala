<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaExperiencia extends Model {

    protected $fillable = [
      'nome',
      'icone'
    ];

    /**
     * Uma CategoriaExperiencia pertence a muitas Experiencias
     */
    public function experiencias()
    {
        return $this->belongsToMany('App\Experiencia');
    }


}
