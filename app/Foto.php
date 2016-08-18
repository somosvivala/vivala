<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model
{
    use SoftDeletes;

    //campos que podem ser mass assigned
    protected $fillable = [
        'path',
        'tipo',
        'foto_owner_experiencia'
    ];

    //datas que vamos servir uma instancia do Carbon
    protected $dates = ['deleted_at'];

    /**
     * Relacao polimorfica de owner.
     * Uma foto pode pertencer a qualquer um que implemente
     * morphOne('App\Foto');
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**
     * Accessor para a propriedade Path, passando o caminho do public
     */
    public function getPathAttribute($value)
    {
        $urlBase = "../../../uploads/";

        //Testa se o valor é uma URL
        if( preg_match ( '/^https?:\/\//' , $value) ) {
            return $value;
        } else {
            return $urlBase.$value;
        }
    }


    /**
     * Accessor para a propriedade Path Publico, passando o caminho do public
     */
    public function getPathPublicoAttribute()
    {
        $urlBase = 'uploads/';
        $fotoPath = str_replace('../../..','',$this->attributes['path']);
        return url($urlBase.$fotoPath);
    }



}
