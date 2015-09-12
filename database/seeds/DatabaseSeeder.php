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
use App\Interesse;

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
        $this->call('InteresseSeeder');




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
            'username'           => 'Evandro',
            'genero'             => 'masculino',
        	'email' 	         => 'evandro.carreira@gmail.com',
        	'password' 	         => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
        ]);

        User::create([
        	'username' 	         => 'Zord',
            'genero'             => 'masculino',
        	'email' 	         => 'zord@gmail.com',
        	'password' 	         => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
        ]);

        User::create([
            'username'           => 'Kuririn',
            'genero'             => 'masculino',
            'email'              => 'kuririn@gmail.com',
            'password'           => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
        ]);

				User::create([
					'username'           => 'Brunol',
					'genero'             => 'masculino',
					'email'              => 'brunol@gmail.com',
					'password'           => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
				]);

				User::create([
					'username'           => 'Rafael',
					'genero'             => 'masculino',
					'email'              => 'rafa.carreira@gmail.com',
					'password'           => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
				]);

				User::create([
					'username'           => 'Goiaba',
					'genero'             => 'masculino',
					'email'              => 'narolol@gmail.com',
					'password'           => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
				]);

				User::create([
					'username'           => 'Atchim',
					'genero'             => 'masculino',
					'email'              => 'atchim@gmail.com',
					'password'           => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
				]);

				User::create([
					'username'           => 'Mateus',
					'genero'             => 'masculino',
					'email'              => 'mateus@gmail.com',
					'password'           => '$2y$10$3hu7mqV8vfotsxNsH7hWY./nUmWSIbUqmZVESqpmQn9onYJ5Et0ca' //123321
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

        $kuririn = Perfil::create([
            'user_id'               => '3',
            'aniversario'      => '1991-09-22 07:43:00',
            'cidade_natal'     => 'Itapeva',
            'nome_completo'     => 'Rodrigo Yasuhiro Ueda',
            'apelido'     => 'Kuririn'
        ]);

        $brunol = Perfil::create([
            'user_id'               => '4',
            'aniversario'      => '1991-09-22 07:43:00',
            'cidade_natal'     => '',
            'nome_completo'     => 'Bruno Gordo',
            'apelido'     => 'Brunol'
        ]);

	      $rafa = Perfil::create([
	          'user_id'               => '5',
	          'aniversario'      => '1994-04-23 07:43:00',
	          'cidade_natal'     => '',
	          'nome_completo'     => 'Rafael Carreira',
	          'apelido'     => 'Rafa'
	      ]);

	      $goiaba = Perfil::create([
	          'user_id'               => '6',
	          'aniversario'      => '1994-04-23 07:43:00',
	          'cidade_natal'     => '',
	          'nome_completo'     => 'Gabriel Naro',
	          'apelido'     => 'Goiaba'
	      ]);

	      $atchim = Perfil::create([
	          'user_id'               => '7',
	          'aniversario'      => '1994-04-23 07:43:00',
	          'cidade_natal'     => '',
	          'nome_completo'     => 'Fernando Fernandes',
	          'apelido'     => 'Atchim'
	      ]);

	      $mateus = Perfil::create([
	          'user_id'               => '8',
	          'aniversario'      => '1994-04-23 07:43:00',
	          'cidade_natal'     => '',
	          'nome_completo'     => 'Mateus Batista',
	          'apelido'     => 'Mateni'
	      ]);
    }

}



class OngSeeder extends Seeder {
    public function run()
    {
        DB::table('ongs')->delete();

        Ong::create([
            'user_id'     => '1',
            'nome'        => 'evandrONG Ltda',
            'apelido'     => 'evandrONG'
        ]);

        Ong::create([
            'user_id'     => '2',
            'nome'        => 'zordONG Ltda',
            'apelido'     => 'zordONG'
        ]);

        Ong::create([
            'user_id'     => '8',
            'nome'        => 'Projeto Formiguinha',
            'apelido'     => 'Formiguinha'
        ]);
    }
}

class EmpresaSeeder extends Seeder {
    public function run()
    {
        DB::table('empresas')->delete();

        Empresa::create([
            'user_id'     => '1',
            'nome'        => 'dodobusiness  Ltda',
            'apelido'     => 'dodobusiness'
        ]);

        Empresa::create([
            'user_id'     => '2',
            'nome'        => 'zordenterprise  Ltda',
            'apelido'     => 'zordenterprise'
        ]);

        Empresa::create([
            'user_id'     => '6',
            'nome'        => 'RedNoise',
            'apelido'     => 'RedNoise'
        ]);

        Empresa::create([
            'user_id'     => '5',
            'nome'        => 'Turbina Loca',
            'apelido'     => 'TL'
        ]);

        Empresa::create([
            'user_id'     => '5',
            'nome'        => 'Water Energy Ltda.',
            'apelido'     => 'we'
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

        $kuririn = Perfil::find(3);
        $kuririnURL = new PrettyUrl();
        $kuririnURL->url = 'kuririn';
        $kuririnURL->tipo = 'usuario';
        $kuririn->prettyUrl()->save($kuririnURL);

        $brunol = Perfil::find(4);
        $brunolURL = new PrettyUrl();
        $brunolURL->url = 'brunol';
        $brunolURL->tipo = 'usuario';
        $brunol->prettyUrl()->save($brunolURL);

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
        $fotoDodo->path = 'https://avatars2.githubusercontent.com/u/192278?v=3&s=460';
        $dodoPerfil->fotos()->save($fotoDodo);


        $zordPerfil = Perfil::find(2);
        $fotoZord = new Foto();
        $fotoZord->tipo = 'avatar';
        $fotoZord->path = 'https://avatars1.githubusercontent.com/u/9811888?v=3&s=400';
        $zordPerfil->fotos()->save($fotoZord);
    }
}

class InteresseSeeder extends Seeder {

    public function run()
    {
        DB::table('interesses')->delete();

        Interesse::create(['nome' => 'Breja']);
        Interesse::create(['nome' => 'Café']);
        Interesse::create(['nome' => 'Whiskey']);
        Interesse::create(['nome' => 'Whisky']);
        Interesse::create(['nome' => 'Badegão']);
        Interesse::create(['nome' => 'Narcos']);
        Interesse::create(['nome' => 'Macarrão']);
        Interesse::create(['nome' => 'Banho']);
        Interesse::create(['nome' => 'Dormir']);
        Interesse::create(['nome' => '%7}ºª¢¬6#$@']);
    }
}
