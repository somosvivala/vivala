<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foto extends Model
{
    use SoftDeletes;

    //campos que podem ser mass assigned
    protected $fillable = ['path', 'tipo'];

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





}
