<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarCausaRequest;
use App\Causa;
use Auth;
use App;

class CausaController extends CuidarController {

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
		//Checando se posso criar causas
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		if ($entidadeAtiva->tipo != 'ong') {
			App::abort(403, "Apenas ongs tem permissão para criar Causas");
		}

		return view('causa.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EditarCausaRequest $request)
	{
		//Checando se posso criar causas
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		if ($entidadeAtiva->tipo != 'ong') {
			App::abort(403, "Apenas ongs tem permissão para criar Causas");
		}

		//Criando uma causa com os campos do formulario
		$novaCausa = new Causa($request->all());

		//Setta o responsavel da causa como sendo o perfil da ong
		$novaCausa->owner()->associate($entidadeAtiva);
		$novaCausa->responsavel()->associate($entidadeAtiva->user->perfil);
		$novaCausa->push();

		return redirect('causas/'.$novaCausa->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$causa = Causa::findOrFail($id);
		$voluntarios = $causa->voluntarios;
		return view('causa.show', compact('causa', 'voluntarios'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$causa = Causa::findOrFail($id);
		if (!$causa->podeEditar) {
			App::abort(403, "Voce não tem permissao para editar essa Causa");
		}

		return view('causa.edit', compact('causa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditarCausaRequest $request)
	{
		$causa = Causa::findOrFail($id);
		if (!$causa->podeEditar) {
			App::abort(403, "Voce não tem permissao para editar essa Causa");
		}

		$causa->update($request->all());
		
		return view('causa.show', compact('causa'));
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
	 * Setta o Perfil de $id como voluntario na Causa de $causaId
	 * @param  [type] $id      [description]
	 * @param  [type] $causaId [description]
	 */
	public function getVoluntariarse($causaId) 
	{
		//pegando a entidadeAtiva para testa seu tipo
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		//@TODO: Por enquanto apenas perfil pode se voluntariar
		if ($entidadeAtiva->tipo != 'perfil') {
			return redirect("causas/$causaId/sobre");
		}

		$perfil = $entidadeAtiva;
		$causa = Causa::findOrFail($causaId);
		
		//Se ja nao for voluntario, tornar-se voluntario
		if (!$causa->voluntarios->find($entidadeAtiva->id)) {
			$causa->voluntarios()->save($perfil);
		}

		return redirect("causas/$causaId");
	}

}
