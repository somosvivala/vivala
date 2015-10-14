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

        Interesse::create(['categoria' => 'estilo' , 'nome' => 'Mochileiro']);
        Interesse::create(['categoria' => 'estilo' , 'nome' => 'Original']);
        Interesse::create(['categoria' => 'estilo' , 'nome' => 'Conforto']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'Sozinho']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'Em família']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'Com amigos']);
        Interesse::create(['categoria' => 'companhia' , 'nome' => 'Em casal']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Praia e sol']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Montanha']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Ecoturismo']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Cidades históricas']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Cidades Pequenas']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Cidades Grandes']);
        Interesse::create(['categoria' => 'ambiente' , 'nome' => 'Retiros espirituais']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'Centro oeste']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'Nordeste']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'Norte']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'Sudeste']);
        Interesse::create(['categoria' => 'regioes' , 'nome' => 'Sul']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Conhecer locais famosos']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Explorar locais desconhecidos']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Ver realidades diferentes da minha']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Vivenciar realidades diferentes da minha']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Buscar experiências que mudem a minha atitude']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Achar respostas à questões existenciais']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Crescimento pessoal']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Imersão Cultural']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Diversão descompromissada e passatempos']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Descansar a mente para retomar o cotidiano']);
        Interesse::create(['categoria' => 'motivacoes' , 'nome' => 'Gosto de não fazer nada']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Eventos típicos (carnaval, festa junina)']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Bares']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Baladas']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Shows']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Festivais']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Cinema']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Espetáculos de tetro e musicais']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Museus']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Eventos esportivos']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Restaurantes renomados']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Restaurantes de comida típica']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Conhecer projetos sociais']);
        Interesse::create(['categoria' => 'eventos' , 'nome' => 'Ser voluntário em projetos sociais']);
    }
}

class CategoriasVagaSeeder extends Seeder {
    
    public function run()
    {
        DB::table('categoria_vagas')->delete();

        CategoriaVaga::create(['nome' => 'Acabar com fome e a miséria']);
        CategoriaVaga::create(['nome' => 'Educação basica de qualidade para todos']);
        CategoriaVaga::create(['nome' => 'Igualdade entre os sexos e a valorizacao mulher']);
        CategoriaVaga::create(['nome' => 'Reduzir a mortalidade infantil']);
        CategoriaVaga::create(['nome' => 'Melhorar a saude das gestantes']);
        CategoriaVaga::create(['nome' => 'Combater a AIDS, a malária outras doencas']);
        CategoriaVaga::create(['nome' => 'Qualidade de vida e respeito ao meio ambiente']);
        CategoriaVaga::create(['nome' => 'Todo mundo trabalhando pelo desenvolvimento']);
    }

}

class CategoriasOngSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_ongs')->delete();

        CategoriaOng::create(['nome' => 'Acabar com fome e a miséria']);
        CategoriaOng::create(['nome' => 'Educação basica de qualidade para todos']);
        CategoriaOng::create(['nome' => 'Igualdade entre os sexos e a valorizacao mulher']);
        CategoriaOng::create(['nome' => 'Reduzir a mortalidade infantil']);
        CategoriaOng::create(['nome' => 'Melhorar a saude das gestantes']);
        CategoriaOng::create(['nome' => 'Combater a AIDS, a malária outras doencas']);
        CategoriaOng::create(['nome' => 'Qualidade de vida e respeito ao meio ambiente']);
        CategoriaOng::create(['nome' => 'Todo mundo trabalhando pelo desenvolvimento']);
    }
}

class CategoriasEmpresaSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_empresas')->delete();

        CategoriaEmpresa::create(['nome' => 'categoria 1']);
        CategoriaEmpresa::create(['nome' => 'categoria 2']);
        CategoriaEmpresa::create(['nome' => 'categoria 3']);
        CategoriaEmpresa::create(['nome' => 'categoria 4']);
        CategoriaEmpresa::create(['nome' => 'categoria 5']);
        CategoriaEmpresa::create(['nome' => 'categoria 6']);
        CategoriaEmpresa::create(['nome' => 'categoria 7']);
        CategoriaEmpresa::create(['nome' => 'categoria 8']);
        CategoriaEmpresa::create(['nome' => 'categoria 9']);
        CategoriaEmpresa::create(['nome' => 'categoria 10']);
    }
}
