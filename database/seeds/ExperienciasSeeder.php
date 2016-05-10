<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Ong;
use App\Perfil;
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
        $this->seedExperienciasComCategorias();
        $this->seedInscricoes();

    }

    /**
     * Funcao para seedar as experiencias ja com alguma categoria
     */
    private function seedExperienciasComCategorias()
    {
        $ong = Ong::orderByRaw('RANDOM()')->first();

        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $experiencia = Experiencia::create([
            'titulo' => 'Primeira Experiencia',
            'descricao' => 'Essa é primeira experiencia, a primeira de muitas!',
            'preco' => 50.00
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $experiencia = Experiencia::create([
            'titulo' => 'Segunda Experiencia',
            'descricao' => 'Essa é segunda experiencia, a segunda de muitas!',
            'preco' => 223.44
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $experiencia = Experiencia::create([
            'titulo' => 'Terceira Experiencia',
            'descricao' => 'Essa é terceira experiencia, a terceira de muitas!',
            'preco' => 12.44
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
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
