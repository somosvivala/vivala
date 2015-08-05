<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Configuracao;
use App\User;
use App\Perfil;
use App\PrettyUrl;
use App\Ong;
use App\Empresa;
use App\Foto;

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
        $this->call('OngSeeder');
        $this->call('EmpresaSeeder');
        $this->call('PrettyUrlSeeder');
        $this->call('FotoSeeder');
/*
        #iseed_start
        // here all the calls for newly generated seeds will be stored.



        $this->call('EstadosTableSeeder');
		$this->call('CidadesTableSeeder');

		#iseed_end
*/

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
        	'password' 	         => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
        ]);

        User::create([
        	'username' 	         => 'zord',
        	'email' 	         => 'zord@gmail.com',
        	'password' 	         => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
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
            'cidade_natal'     => 'Bauru',
            'nome_completo'     => 'Evandro Barbosa Carreira',
            'apelido'     => 'Dodoido'
        ]);

        $zord = Perfil::create([
            'user_id'               => '2',
            'aniversario'      => '1992-05-08 07:43:00',
            'cidade_natal'     => 'Rio Preto',
            'nome_completo'     => 'Antônio Renato Apolinário Gomes',
            'apelido'     => 'Zordoido'
        ]);

    }

}



class OngSeeder extends Seeder {
    public function run()
    {
        DB::table('ongs')->delete();

        Ong::create([
            'user_id'     => '1',
            'nome'        => 'evandrONG',
        ]);

        Ong::create([
            'user_id'     => '2',
            'nome'        => 'zordONG',
        ]);
    }
}

class EmpresaSeeder extends Seeder {
    public function run()
    {
        DB::table('empresas')->delete();

        Empresa::create([
            'user_id'     => '1',
            'nome'        => 'dodobusiness',
        ]);

        Empresa::create([
            'user_id'     => '2',
            'nome'        => 'zordenterprise',
        ]);
    }
}

class PrettyUrlSeeder extends Seeder {
    public function run()
    {
        DB::table('pretty_urls')->delete();


        /**
         * Perfil
         */
        $dodo = Perfil::find(1);
        $dodoURL = new PrettyUrl();
        $dodoURL->url   = 'evandro';
        $dodoURL->tipo  = 'usuario';
        $dodo->prettyUrl()->save($dodoURL);

        $zord = Perfil::find(2);
        $zordURL = new PrettyUrl();
        $zordURL->url = 'zord';
        $zordURL->tipo = 'usuario';
        $zord->prettyUrl()->save($zordURL);

        /**
         * Empresas
         */
        $dodobusiness  = Empresa::find(1);
        $dodobusiness_url = new PrettyUrl();
        $dodobusiness_url->url   = 'dodobusiness';
        $dodobusiness_url->tipo  = 'empresa';
        $dodobusiness->prettyUrl()->save($dodobusiness_url);

        $zordenterprise  = Empresa::find(2);
        $zordenterprise_url = new PrettyUrl();
        $zordenterprise_url->url   = 'zordenterprise';
        $zordenterprise_url->tipo  = 'empresa';
        $zordenterprise->prettyUrl()->save($zordenterprise_url);


        /**
         *  ONGS
         */
        $evandrONG  = Ong::find(1);
        $evandrONG_url = new PrettyUrl();
        $evandrONG_url->url = 'evandrong';
        $evandrONG_url->tipo = 'ong';

        $zordONG  = Ong::find(2);
        $zordONG_url = new PrettyUrl();
        $zordONG_url->url = 'zordong';
        $zordONG_url->tipo = 'ong';

        $evandrONG->prettyUrl()->save($evandrONG_url);
        $zordONG->prettyUrl()->save($zordONG_url);

    }
}

class FotoSeeder extends Seeder {
    
    public function run()
    {
        DB::table('fotos')->delete();

            $dodoPerfil = Perfil::find(1);
            $fotoDodo = new Foto();
            $fotoDodo->tipo = 'avatar';
            $fotoDodo->path = 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xfa1/v/t1.0-9/10881937_10205138988501966_880908969196321312_n.jpg?oh=4036e3ead0d2629c86b5228d343c69d9&oe=55FAD9BB&__gda__=1442687024_c8e9de1eff4318206fde21b4a418e3c8';
            $dodoPerfil->fotos()->save($fotoDodo);


            $zordPerfil = Perfil::find(2);
            $fotoZord = new Foto();
            $fotoZord->tipo = 'avatar';
            $fotoZord->path = 'https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10374994_706677562743225_4888707270232254721_n.jpg?oh=0b62f6d66c4c708a561daed00b2456d5&oe=56539E2E&__gda__=1447231894_5ca196c8540f1311b6f5e996440c8cd5';
            $zordPerfil->fotos()->save($fotoZord);
    }
}


