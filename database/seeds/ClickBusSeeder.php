<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Configuracao;
use App\Repositories\ClickBusRepository;
use App\CompraClickbusPoltrona;
use App\ClickBusCompany;
use App\ClickBusPlace;

/**
 * Seeder para alimentar os dados da ClickBus.
 * Faz um 'backup' das poltronas existentes,
 * Remove/Re-insere os places e as viacoes usando do link fornecido pelo repositorio da Clickbus
 * Re-insere as poltronas que existiam antes do refresh
 */
class ClickBusSeeder extends Seeder
{
    //Como vamos lidar com informacoes da Clickbus, usamos o seu repositorio
    public $clickBusRepository;

    //Injetando dependencia no construtor do seeder, assim
    //o laravel providencia uma instancia desse objeto
    function __construct(ClickBusRepository $repository)
    {
        $this->clickBusRepository = $repository;
    }

    public function run()
    {
        //pegando todas as poltronas que ja foram requisitadas para re-inserilas após o refresh de places e companies
        $poltronas = CompraClickbusPoltrona::all();

        DB::table('compras_clickbus_poltronas')->delete();
        DB::table('ClickBusPlaces')->delete();
        DB::table('ClickBusCompanies')->delete();

        $this->popularClickBusPlaces();
        $this->popularClickBusCompanies();

        echo "\n\n === Insercoes finalizadas ";
        echo "\n === Places: " . ClickBusPlace::count();
        echo "\n === Companies: " . ClickBusCompany::count();

        //Aqui as inserções terminaram e as tabelas estao atualizadas
        //portanto hora de re-inserir as $poltronas
        $this->reInserePoltronas($poltronas);
    }

    /**
     * Metodo para consumir o endpoint /places da ClickBus e inserir os places no BD
     */
    public function popularClickBusPlaces()
    {
        //usando do repositorio da clickbus para fornecer a url de production ou development
        $clickbusPlaces = file_get_contents($this->clickBusRepository->url .'/places');
        $clickbusHash = md5($clickbusPlaces);
        $clickbusPlaces = (array)json_decode($clickbusPlaces)->items;

        //iterando sobre os places e montando o array para insercao no BD local
        foreach ($clickbusPlaces as $place) {
            $array_insert = array(
                'id'               => $place->id,
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

            /**
             * Removido obtencao da latitude/longitude dos places da Clickbus, estavam vindo fora de formato.
             *

            //Se estiver usando postgres, e o place tiver um campo lat / long, entao adicionar geoponto
            if (strcasecmp(env('DB_DRIVER'), 'pgsql') == 0 && count($place->place->longitude) > 0 && count($place->place->latitude) > 0) {
                $array_insert['place_position'] = DB::raw("ST_GeomFromText('POINT({$place->place->longitude} {$place->place->latitude})', 4326)");
            }

            **/

            //Inserindo coluna.
            DB::table('ClickBusPlaces')->insert($array_insert);
        }
    }

    /**
     * Metodo para consumir o endpoint /buscompanies da ClickBus e inserir as viacoes no BD
     */
    public function popularClickBusCompanies()
    {
        //pegando o total de paginas
        $pages = json_decode(file_get_contents($this->clickBusRepository->url .'/buscompanies'))->meta->totalPages;
        $busCompaniesHash = '';

        //pegando uma pagina e inserindo suas viacoes
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
            }
        }
    }

    /**
     * Metodo para iterar sob uma collection de poltronas e re-inserilas no bd
     * @param $poltronas - Collection<CompraClickbusPoltrona>
     */
    public function reInserePoltronas($poltronas)
    {
        foreach ($poltronas as $poltrona) {
            CompraClickbusPoltrona::create($poltrona->toArray());
        }
    }
}


?>
