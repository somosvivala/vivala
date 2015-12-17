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
            'localizer',
            'payment_method',
            'total',
            'currency',
            'quantidade_passagens',
            'ida_quantidade',
            'ida_trip_id',
            'ida_trip_localizers', 
            'ida_departure_waypoint_id',
            'ida_arrival_waypoint_id',
            'ida_trip_date',
            'volta_quantidade',
            'volta_trip_id',
            'volta_trip_localizers',
            'volta_departure_waypoint_id',
            'volta_arrival_waypoint_id',
            'volta_trip_date',
            'pagamento_confirmado' 
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
