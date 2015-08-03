<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClickBusPlacesSeeder extends Seeder {
    public function run()
    {
        DB::table('clickbus_places')->delete();

        $clickbusPlaces = file_get_contents('https://api-evaluation.clickbus.com.br/api/v1/places');

        $clickbusHash = md5($clickbusPlaces);
        $clickbusPlaces = (array)json_decode($clickbusPlaces)->items;

        foreach ($clickbusPlaces as $place) {
            $array_insert = array(
                'item_id'          => $place->id,
                'station_id'       => $place->station_id,
                'slug'             => $place->slug,
                'locale'           => $place->locale,
                'is_primary'       => $place->is_primary,
                'item_created_at'  => $place->created_at,
                'item_updated_at'  => $place->updated_at,
                'place_created_at' => $place->place->created_at,
                'place_updated_at' => $place->place->updated_at,
                'place_id'         => $place->place->place_id,
                'place_name'       => $place->place->name,
                'state_code'       => $place->place->state->code,
                'state_name'       => $place->place->state->name
            );
            if (strcasecmp(env('DB_DRIVER'), 'pgsql') == 0 && count($place->place->longitude) > 0 && count($place->place->latitude) > 0) {
                $array_insert['place_position'] = DB::raw("ST_GeomFromText('POINT({$place->place->longitude} {$place->place->latitude})', 4326)");
            }
            DB::table('clickbus_places')->insert($array_insert);
        }
    }
}

?>