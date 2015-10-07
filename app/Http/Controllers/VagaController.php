<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarVagaRequest;
use App\Vaga;
use Auth;
use App;

class VagaController extends CuidarController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
                $ongs = Auth::user()->ongs;
		return view('vaga.create');
            
            } else {
                App::abort(403, "Voce não possui nenhuma Ong cadastrada para criar novas Vagas");
            }

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EditarVagaRequest $request)
	{
		//Checando se posso criar vagas
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		if ($entidadeAtiva->tipo != 'ong') {
			App::abort(403, "Apenas ongs tem permissão para criar Vagas");
		}

		//Criando uma vaga com os campos do formulario
		$novaVaga = new Vaga($request->all());

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
