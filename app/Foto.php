<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model {

	protected $fillable = ['path', 'tipo'];

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
