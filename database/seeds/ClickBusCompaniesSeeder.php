<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClickBusCompaniesSeeder extends Seeder {
    public function run()
    {
        DB::table('clickbus_companies')->delete();

        $pages = json_decode(file_get_contents('https://api-evaluation.clickbus.com.br/api/v1/buscompanies'))->meta->totalPages;

        for ($i = 1; $i <= intval($pages); $i++) { 
            $companies = json_decode(file_get_contents("https://api-evaluation.clickbus.com.br/api/v1/buscompanies?page={$i}"))->busCompanies;

            foreach ($companies as $company) {
                DB::table('clickbus_companies')->insert(array(
                    'id'       => $company->id,
                    'nome'     => $company->name,
                    'logo_url' => $company->logo->url
                ));       
            }            
        }
    }
}

?>