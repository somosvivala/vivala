<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Request;
use App\Post;
use App\Foto;

class PostController extends VivalaBaseController {

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$novoPost = new Post();
		$novoPost->descricao = Request::input('descricao');
		$novoPost->tipoPost = Request::input('tipoPost');
		//Salva o post com o id do perfil do usuário que está logado
		Auth::user()->perfil->posts()->save($novoPost);

		// Adiciona a foto no post através do id recebido
		$idFoto = Request::input('fotos');//ta no plural mas vem só uma por enquanto
		if(is_numeric($idFoto)) {
			$Foto = Foto::find($idFoto);
			$novoPost->fotos()->save($Foto);
		}

		return redirect('conectar');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

}
