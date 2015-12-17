<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraClickbus extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "compra_clickbuses";

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
