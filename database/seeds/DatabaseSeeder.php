<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Configuracao;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('ConfiguracaoSeeder');
	}

}

class ConfiguracaoSeeder extends Seeder {

    public function run()
    {
        DB::table('configuracaos')->delete();

        Configuracao::create(['char_nome_configuracao' => 'title', 'text_valor_configuracao' => 'Vivalá']);
    }

}