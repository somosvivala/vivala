<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraClickbus extends Model {

    $table = "compra_clickbuses";

    protected $fillable =
        [
            'user_id',
            'localizer'
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
