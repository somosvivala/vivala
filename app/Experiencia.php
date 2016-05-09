<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{

    //mass assigned fields
    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'status'
    ];

    /**
     * Uma Experiencia pode ser feito por ongs ou empresas
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**
     * Uma Experiencia tem uma foto.
     */
    public function fotoCapa()
    {
        return $this->morphOne('App\Foto', 'owner', 'owner_type', 'owner_id');
    }


    /**
     * Uma experiencia tem muitas inscriçoes
     */
    public function inscricoes()
    {
        return $this->hasMany('App\InscricaoExperiencia');
    }

    /**
     * Uma Experiencia pertence a muitas CategoriaExperiencia 
     */
    public function categorias()
    {
        return $this->belongsToMany('App\CategoriaExperiencia');
    }

}
