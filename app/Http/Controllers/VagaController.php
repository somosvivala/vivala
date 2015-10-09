<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarVagaRequest;
use App\Http\Requests\CriarVagaRequest;
use App\Vaga;
use Auth;
use App;

use Illuminate\Database\Eloquent\Collection;
use App\Cidade;
use App\Ong;
use App\Estado;
use App\CategoriaVaga;

use Request;


class VagaController extends CuidarController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
         //   $causas = Vaga::all(); //ta quebrando
            $causas = Ong::all();
            $categorias = CategoriaOng::all();
            $cidades = Ong::getCidadesComOngs();
            
            $cidadesArray = array(0 => 'Selecione uma Cidade');
            foreach ($cidades as $cidade)
            {
                $cidadesArray[$cidade->id] = $cidade->nome;
            }
            $cidades = $cidadesArray;
        
            return view('cuidar.vagas', compact('causas','categorias', 'cidades'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

            //Checando se posso criar vagas, (se tenho ongs)
            if (count(Auth::user()->ongs) > 0)
            {
                //Obtendo ongs do usuario 
                $ongs = Auth::user()->ongs;

                //Montando array de ongs para select 
                $ongsArray = array(0 => 'Selecione uma Ong');
                foreach ($ongs as $ong)
                {
                    $ongsArray[$ong->id] = $ong->nome;
                }
                $ongs = $ongsArray;

                $categoriasVaga = CategoriaVaga::all();

                //Ordenando array de cidades para ficar cidadeID => cidadeNome 
                $cidades = Cidade::all()->keyBy('id');
                foreach ($cidades as $cidade)
                {
                    $cidadesArray[$cidade->id] = $cidade->nome;
                }
                $cidades = $cidadesArray;

                //Ordenando array de estados para ficar estadoID => estadoNome 
                $estados = Estado::all();
                $estadosArray = array(0 => 'Selecione um Estado');
                foreach ($estados as $estado)
                {
                    $estadosArray[$estado->id] = $estado->nome;
                }
                $estados = $estadosArray; 
        
        
                return view('vaga.create', compact('categoriasVaga', 'ongs', 'cidades', 'estados') );
            
            } else {
                App::abort(403, "Voce não possui nenhuma Ong cadastrada para criar novas Vagas");
            }

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CriarVagaRequest $request)
	{

                $ongResponsavel = Ong::find($request->get('ong'));
                
                //Checando se posso criar vagas
		if (!($ongResponsavel->user->id === Auth::user()->id)) {
			App::abort(403, "Apenas ongs tem permissão para criar Vagas");
		}

		//Criando uma vaga com os campos do formulario
		$novaVaga = $ongResponsavel->vagas()->create($request->all());

               dd($novaVaga); 

		//Setta o responsavel da vaga como sendo o perfil da ong
		$novaVaga->owner()->associate($entidadeAtiva);
		$novaVaga->responsavel()->associate($entidadeAtiva->user->perfil);
		$novaVaga->push();

		return redirect('vagas/'.$novaVaga->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vaga = Vaga::findOrFail($id);
		$voluntarios = $vaga->voluntarios;
		return view('vaga.show', compact('vaga', 'voluntarios'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vaga = Vaga::findOrFail($id);
		if (!$vaga->podeEditar) {
			App::abort(403, "Voce não tem permissao para editar essa Vaga");
		}

		return view('vaga.edit', compact('vaga'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditarVagaRequest $request)
	{
		$vaga = Vaga::findOrFail($id);
		if (!$vaga->podeEditar) {
			App::abort(403, "Voce não tem permissao para editar essa Vaga");
		}

		$vaga->update($request->all());
		
		return view('vaga.show', compact('vaga'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	/**
	 * Setta o Perfil de $id como voluntario na Vaga de $vagaId
	 * @param  [type] $id      [description]
	 * @param  [type] $vagaId [description]
	 */
	public function getVoluntariarse($vagaId) 
	{
		//pegando a entidadeAtiva para testa seu tipo
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		//@TODO: Por enquanto apenas perfil pode se voluntariar
		if ($entidadeAtiva->tipo != 'perfil') {
			return redirect("vagas/$vagaId/sobre");
		}

		$perfil = $entidadeAtiva;
		$vaga = Vaga::findOrFail($vagaId);
		
		//Se ja nao for voluntario, tornar-se voluntario
		if (!$vaga->voluntarios->find($entidadeAtiva->id)) {
			$vaga->voluntarios()->save($perfil);
		}

		return redirect("vagas/$vagaId");
	}

}
