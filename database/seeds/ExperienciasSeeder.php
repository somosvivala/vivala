<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Ong;
use App\Perfil;
use App\Cidade;
use App\Experiencia;
use App\CategoriaExperiencia;
use App\InscricaoExperiencia;

class ExperienciasSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_experiencia_experiencia')->delete();
        DB::table('categoria_experiencias')->delete();
        DB::table('experiencias')->delete();

        $this->seedCategorias();
        $this->seedExperiencias();
        $this->seedInscricoes();

    }

    /**
     * Funcao para seedar as experiencias
     */
    private function seedExperiencias()
    {
        $ong = Ong::orderByRaw('RANDOM()')->first();

        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $localExperiencia = Cidade::orderByRaw('RANDOM()')->first();
        $informacaoExperiencia = InformacaoExperiencia::create([
            'descricao'=>'descricao a ver com bolinha',
            'icone' => 'fa fa-circle'
        ]);
        $experiencia = Experiencia::create([
            'titulo' => 'Primeira Experiencia',
            'descricao' => 'Essa é a descricao da primeira experiencia!',
            'frase_listagem' => 'Venha conheçer a 1º Experiencia!!!',
            'detalhes' => "Esses são os detalhes, da experiencia \n  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'preco' => 50.00
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->informacoes()->save($informacaoExperiencia);
        $experiencia->local()->associate($localExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $localExperiencia = Cidade::orderByRaw('RANDOM()')->first();
        $informacaoExperiencia = InformacaoExperiencia::create([
            'descricao'=>'descricao a ver com patinha',
            'icone' => 'fa fa-paw'
        ]);
        $experiencia = Experiencia::create([
            'titulo' => 'Segunda Experiencia',
            'descricao' => 'Essa é a descricao da Segunda experiencia!',
            'frase_listagem' => 'Venha conheçer a 2º Experiencia!!!',
            'detalhes' => "Esses são os detalhes, da experiencia de numero 2 \n  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'preco' => 223.44
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->informacoes()->save($informacaoExperiencia);
        $experiencia->local()->associate($localExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $localExperiencia = Cidade::orderByRaw('RANDOM()')->first();
        $informacaoExperiencia = InformacaoExperiencia::create([
            'descricao'=>'Acessibilidade ',
            'icone' => 'fa fa-universal-access'
        ]);
        $experiencia = Experiencia::create([
            'titulo' => 'Terceira Experiencia',
            'descricao' => 'Essa é a descricao da Terceira experiencia!',
            'frase_listagem' => 'Nao perca, essa super mega 3º Experiencia!!!',
            'detalhes' => "Lorem ipsum dolor sittempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. \n\n Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident",
            'preco' => 12.44
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->informacoes()->save($informacaoExperiencia);
        $experiencia->local()->associate($localExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $ong->push();
    }

    /**
     * Funcao para seedar as Categorias
     */
    private function seedCategorias()
    {
        CategoriaExperiencia::create([
            'nome' => 'Ecoturismo',
            'icone' => 'path para icone ?',
        ]);

        CategoriaExperiencia::create([
            'nome' => 'Fotografia',
            'icone' => 'path para icone ?',
        ]);

        CategoriaExperiencia::create([
            'nome' => 'Culinária',
            'icone' => 'path para icone ?',
        ]);

        CategoriaExperiencia::create([
            'nome' => 'Jardinagem',
            'icone' => 'path para icone ?',
        ]);
    }

    /**
     * Funcao para seedar algumas inscricoes nas experiencias dummy
     */
    private function seedInscricoes()
    {
        //inserindo 5 inscricoes
        for ($i = 0; $i < 5; $i++) {

            //cria nova nova inscricao
            $inscricao = InscricaoExperiencia::create([]);

            //associa a inscricao a uma experiencia e a um perfil
            $inscricao->experiencia()->associate(Experiencia::orderByRaw('RANDOM()')->first());
            $inscricao->perfil()->associate(Perfil::orderByRaw('RANDOM()')->first());

            //persiste a instancia no bd fazendo update das relacoes
            $inscricao->push();
        }
    }

}
