<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Configuracao;
use App\Repositories\ClickBusRepository;

class ClickBusSeeder extends Seeder {

    public $clickBusRepository;

    //Injetando dependencia no construtor do seeder, assim
    //o laravel providencia uma instancia desse objeto
    //typehinted
    function __construct(ClickBusRepository $repository)
    {
        $this->clickBusRepository = $repository;
    }

    public function run()
    {
        DB::table('ClickBusPlaces')->delete();

        $clickbusPlaces = file_get_contents($this->clickBusRepository->url .'/places');

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
            DB::table('ClickBusPlaces')->insert($array_insert);
            echo "ID -> $place->id  em ClickbusPlaces \n";
        }

        DB::table('ClickBusCompanies')->delete();

        $pages = json_decode(file_get_contents($this->clickBusRepository->url .'/buscompanies'))->meta->totalPages;
        $busCompaniesHash = '';
        for ($i = 1; $i <= intval($pages); $i++) {
            $companies = file_get_contents($this->clickBusRepository->url ."/buscompanies?page={$i}");
            $busCompaniesHash .= $companies;
            $companies = json_decode($companies)->busCompanies;

            foreach ($companies as $company) {
                DB::table('ClickBusCompanies')->insert(array(
                    'id'       => $company->id,
                    'nome'     => $company->name,
                    'logo_url' => $company->logo->url
                ));
                echo "ID -> $company->id  em ClickBusCompanies \n";
            }
        }
    }
}

?>
