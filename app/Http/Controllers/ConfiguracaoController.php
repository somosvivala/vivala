<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Configuracao;
use Request;

class ConfiguracaoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$configuracoes = Configuracao::all();

		return view('configuracao.index', compact('configuracoes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('configuracao.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Configuracao::create(Request::all());
		
		return redirect('configuracao');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$configuracao = Configuracao::findOrFail($id);
		return view('configuracao.show', 	compact('configuracao'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	 * Get method for Configuracoes
	 * @param  String 		$configuracao_nome 		indice da configuracao
	 * @return String                    			valor da configuracao
	 */
	public static function get($configuracao_nome) {
		$valor_configuracao = Configuracao::where('nome', '=', $configuracao_nome)
			->firstOrFail()
			->valor;

		return $valor_configuracao;
	}
}
