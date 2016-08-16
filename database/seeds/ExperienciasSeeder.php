<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Ong;
use App\Perfil;
use App\Cidade;
use App\Experiencia;
use App\CategoriaExperiencia;
use App\InscricaoExperiencia;
use App\InformacaoExperiencia;
use App\DataOcorrenciaExperiencia;
use Carbon\Carbon;

class ExperienciasSeeder extends Seeder {

    public function run()
    {
        DB::table('categoria_experiencia_experiencia')->delete();
        DB::table('categoria_experiencias')->delete();
        DB::table('experiencias')->delete();
        DB::table('inscricao_experiencias')->delete();
        DB::table('informacao_experiencias')->delete();

        $this->seedCategorias();
        $this->seedExperiencias();

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
        $ocorrenciaExperiencia = DataOcorrenciaExperiencia::create(['data_ocorrencia' => Carbon::now()->addDays(8)]);
        $experiencia = Experiencia::create([
            'owner_nome' => $ong->nome,
            'owner_descricao' => 'texto descritivo do owner que aparecera no email',
            'endereco_completo' => 'Rua Capitão Gomes Duarte 9-50, Bauru, SP, 17014020',
            'frequencia' => 'Evento único',
            'tipo' => 'evento_unico',
            'status' => 'publicada',
            'descricao' => 'Essa é a descricao da primeira experiencia!',
            'descricao_na_listagem' => 'Venha conheçer a 1º Experiencia!!!',
            'detalhes' => "Esses são os detalhes, da experiencia \n  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'preco' => 50.00
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->ocorrencias()->save($ocorrenciaExperiencia);
        $experiencia->informacoes()->save($informacaoExperiencia);
        $experiencia->local()->associate($localExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $ong = Ong::orderByRaw('RANDOM()')->first();
        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $localExperiencia = Cidade::orderByRaw('RANDOM()')->first();
        $informacaoExperiencia = InformacaoExperiencia::create([
            'descricao'=>'descricao a ver com patinha',
            'icone' => 'fa fa-paw'
        ]);
        $ocorrenciaExperiencia = DataOcorrenciaExperiencia::create(['data_ocorrencia' => Carbon::now()->addDays(15 - Carbon::now()->format('d'))]);
        $experiencia = Experiencia::create([
            'owner_nome' => $ong->nome,
            'owner_descricao' => 'texto descritivo de quem provome a experiencia (aparecera no email)',
            'endereco_completo' => 'Rua Capitão Gomes Duarte 9-50, Bauru, SP, 17014020',
            'frequencia' => 'Todo dia 15',
            'tipo' => 'evento_recorrente',
            'status' => 'publicada',
            'descricao' => 'Essa é a descricao da Segunda experiencia!',
            'descricao_na_listagem' => 'Venha conheçer a 2º Experiencia!!!',
            'detalhes' => "Esses são os detalhes, da experiencia de numero 2 \n  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'preco' => 23.44
        ]);
        $experiencia->categorias()->save($categoriaExperiencia);
        $experiencia->ocorrencias()->save($ocorrenciaExperiencia);
        $ocorrenciaExperiencia = DataOcorrenciaExperiencia::create(['data_ocorrencia' => Carbon::now()->addDays(15 - Carbon::now()->format('d'))->addMonths(1)]);
        $experiencia->ocorrencias()->save($ocorrenciaExperiencia);
        $ocorrenciaExperiencia = DataOcorrenciaExperiencia::create(['data_ocorrencia' => Carbon::now()->addDays(15 - Carbon::now()->format('d'))->addMonths(2)]);
        $experiencia->ocorrencias()->save($ocorrenciaExperiencia);

        $experiencia->informacoes()->save($informacaoExperiencia);
        $experiencia->local()->associate($localExperiencia);
        $experiencia->push();
        $ong->experiencias()->save($experiencia);

        $ong = Ong::orderByRaw('RANDOM()')->first();
        $categoriaExperiencia = CategoriaExperiencia::orderByRaw('RANDOM()')->first();
        $localExperiencia = Cidade::orderByRaw('RANDOM()')->first();
        $informacaoExperiencia = InformacaoExperiencia::create([
            'descricao'=>'Acessibilidade ',
            'icone' => 'fa fa-universal-access'
        ]);
        $experiencia = Experiencia::create([
            'owner_nome' => $ong->nome,
            'owner_descricao' => 'texto descritivo de quem promove a experiencia (aparecera no email)',
            'endereco_completo' => 'Rua Capitão Gomes Duarte 9-50, Bauru, SP, 17014020',
            'frequencia' => 'Todos os dias, só agendar!',
            'tipo' => 'evento_servico',
            'tipo_servico_dias' => array('Terça','Quarta','Sexta'),
            'descricao' => 'Essa é a descricao da Terceira experiencia!',
            'descricao_na_listagem' => 'Nao perca, essa super mega 3º Experiencia!!!',
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
            'nome' => 'Reciclagem',
            'icone' => 'fa fa-recycle',
        ]);

        CategoriaExperiencia::create([
            'nome' => 'Fotografia',
            'icone' => 'fa fa-camera',
        ]);

        CategoriaExperiencia::create([
            'nome' => 'Acessibilidade',
            'icone' => 'fa fa-universal-access',
        ]);

        CategoriaExperiencia::create([
            'nome' => 'Jardinagem',
            'icone' => 'fa fa-tree',
        ]);
    }


}
