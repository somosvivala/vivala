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
use App\CategoriaOng;
use App\CategoriaEmpresa;
use App\CategoriaVaga;

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
        $this->call('CategoriasOngSeeder');
        $this->call('CategoriasVagaSeeder');
        $this->call('OngSeeder');
        $this->call('CategoriasEmpresaSeeder');
        $this->call('EmpresaSeeder');
        $this->call('PrettyUrlSeeder');
        $this->call('FotoSeeder');
        $this->call('InteresseSeeder');

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
        	'username' 	         => 'Pedro Gayotto',
            'genero'             => 'fb.male',
        	'email' 	         => 'pedro_bpg@hotmail.com',
        	'fb_token' 	         => 'CAAWuNGLcPe0BAHHYFrCCtBaWgDmwqUZBbmiHyYRuufbFLFwUgI5I80bZCiu6IO6PW47icEpi0AvEJVl68rN19cpkcDLdZCLE2MhLQdNAlsKX0I7YqJRZAFOS4GNAqJzeVnthrwZBTl5Y8dhbXPchO1JabdCCbJC6MZAcnA6elX7yQ4V4muoWPweR9uT2xtrtNdnF7bAv15ZAwZDZD' //123321
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
            'descricao_curta'     => 'Developer, pirata e ta sempre viajando.',
            'descricao_longa'     => 'Open Source Developer, acredita na propagação da informação como ferramenta de transformação social.',
            'nome_completo'     => 'Evandro Barbosa Carreira',
            'apelido'     => 'Dodoido'
        ]);


        $zord = Perfil::create([
            'user_id'               => '2',
            'aniversario'      => '1992-05-08 07:43:00',
            'cidade_natal'     => 'Rio Preto',
            'nome_completo'     => 'Antônio Renato Apolinário Gomes',
            'descricao_curta'     => 'Developer, samurai e ta sempre viajando',
            'descricao_longa'     => '',
            'apelido'     => 'Zordoido'
        ]);

        $pg = Perfil::create([
            'user_id'               => '3',
            'aniversario'      => '1992-02-23 07:43:00',
            'cidade_natal'     => 'São Paulo',
            'nome_completo'     => 'Pedro Gayotto',
            'descricao_curta'     => 'é nois que ta',
            'descricao_longa'     => '',
            'apelido'     => 'PG'
        ]);

    }

}



class OngSeeder extends Seeder {
    public function run()
    {
        DB::table('ongs')->delete();

    }
}

class EmpresaSeeder extends Seeder {
    public function run()
    {
        DB::table('empresas')->delete();
/*
        $vivala = Empresa::create([
            'user_id'               => '3',
            'nome'     => 'Vivalá',
        ]);
*/
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

    }
}

class FotoSeeder extends Seeder {

    public function run()
    {
        DB::table('fotos')->delete();


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

        Interesse::create(['categoria' => 'estilo' , 'nome' => 'global.quiz_traveller_style_cat-1']);
        Interesse::create(['categoria' => 'estilo' , 'nome' => 'global.quiz_traveller_style_cat-2']);
        Interesse::create(['categoria' => 'estilo' , 'nome' => 'global.quiz_traveller_style_cat-3']);
				
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'global.quiz_traveller_partner_cat-1']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'global.quiz_traveller_partner_cat-2']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'global.quiz_traveller_partner_cat-3']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'global.quiz_traveller_partner_cat-4']);

        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-1']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-2']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-3']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-4']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-5']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-6']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'global.quiz_traveller_ambient_cat-7']);

        Interesse::create(['categoria' => 'regioes' , 'nome' => 'global.quiz_traveller_region_cat-1']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'global.quiz_traveller_region_cat-2']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'global.quiz_traveller_region_cat-3']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'global.quiz_traveller_region_cat-4']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'global.quiz_traveller_region_cat-5']);

        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-1']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-2']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-3']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-4']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-5']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-6']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-7']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-8']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-9']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-10']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'global.quiz_traveller_motivation_cat-11']);

        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-1']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-2']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-3']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-4']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-5']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-6']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-7']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-8']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-9']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-10']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-11']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-12']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'global.quiz_traveller_events_cat-13']);
    }
}

class CategoriasVagaSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_vagas')->delete();

        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-1']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-2']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-3']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-4']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-5']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-6']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-7']);
        CategoriaVaga::create(['nome' => 'global.ong_job_slot_avaiable_cat-8']);
    }

}

class CategoriasOngSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_ongs')->delete();

        CategoriaOng::create(['nome' => 'global.ong_onu_cat-1']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-2']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-3']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-4']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-5']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-6']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-7']);
        CategoriaOng::create(['nome' => 'global.ong_onu_cat-8']);
    }
}

class CategoriasEmpresaSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_empresas')->delete();

        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-1']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-2']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-3']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-4']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-5']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-6']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-7']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-8']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-9']);
        CategoriaEmpresa::create(['nome' => 'global.company_type-cat-10']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-11']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-12']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-13']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-14']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-15']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-16']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-17']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-18']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-19']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-20']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-21']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-21']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-22']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-23']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-24']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-25']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-26']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-27']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-28']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-29']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-30']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-31']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-32']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-33']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-34']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-35']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-36']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-37']);
				CategoriaEmpresa::create(['nome' => 'global.company_type-cat-38']);
		}
}
