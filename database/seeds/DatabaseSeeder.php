<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Configuracao;
use App\User;
use App\Perfil;
use App\PrettyUrl;
use App\Ong;

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
		$this->call('UserSeeder');
        $this->call('PerfilSeeder');
        $this->call('PrettyUrlSeeder');
        $this->call('OngSeeder');
	}
}

class ConfiguracaoSeeder extends Seeder {

    public function run()
    {
        DB::table('configuracaos')->delete();

        Configuracao::create(['nome' => 'title', 'valor' => 'Vivalá']);
    }
}

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'username'           => 'evandro', 
        	'email' 	         => 'evandro.carreira@gmail.com',
        	'password' 	         => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca', //123321
        	'avatar' 	         => 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xfa1/v/t1.0-9/10881937_10205138988501966_880908969196321312_n.jpg?oh=4036e3ead0d2629c86b5228d343c69d9&oe=55FAD9BB&__gda__=1442687024_c8e9de1eff4318206fde21b4a418e3c8'
        ]);

        User::create([
        	'username' 	         => 'zord', 
        	'email' 	         => 'zord@gmail.com',
        	'password' 	         => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca', //123321
        	'avatar' 	         => 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/p160x160/10374994_706677562743225_4888707270232254721_n.jpg?oh=d4f0daa8f62f27904266b4eb48876ae0&oe=55C2EE6F&__gda__=1438591338_31d1bca33986c333c0434e1ce01cd8a4'
        ]);
    }
}

class PerfilSeeder extends Seeder {

    public function run()
    {
        DB::table('perfils')->delete();

        $dodo = Perfil::create([
            'user_id'               => '1', 
        	'aniversario' 	    => '1990-12-21 07:30:00',
        	'cidade_natal'     => 'Bauru'
        ]);

        $zord = Perfil::create([
            'user_id'               => '2', 
            'aniversario'      => '1992-05-08 07:43:00',
        	'cidade_natal'     => 'Rio Preto'
        ]);

		$dodo->follow()->attach($zord->id);
    }

}

class PrettyUrlSeeder extends Seeder {
    public function run()
    {
        DB::table('pretty_urls')->delete();

        PrettyUrl::create([
            'perfil_id'               => '1', 
            'url'    => 'evandro',
            'tipo'   => 'usuario'
        ]);

        PrettyUrl::create([
            'perfil_id'               => '2', 
            'url'    => 'zord',
            'tipo'   => 'usuario'
        ]);
    }
}

class OngSeeder extends Seeder {
    public function run()
    {
        DB::table('ongs')->delete();

        Ong::create([
            'user_id'           => '1', 
            'nome'    => 'evandrONG',
        ]);

        Ong::create([
            'user_id'           => '2', 
            'nome'    => 'zordONG',
        ]);
    }
}
