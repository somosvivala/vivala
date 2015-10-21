<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chefsclub extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chefsclub';

    public $timestamps = false;

    public static function getTipoCozinhaForSelect() 
    {
        return self::distinct()->select('tipo_cozinha')->get();
    }

    public static function getDescontoForSelect() 
    {
        return self::distinct()->select('desconto')->get();
    }
}
