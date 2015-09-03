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
		$novoPost->tipo_post = Request::input('tipo_post');
		
		//Salvando novoPost para entidadeAtiva
		Auth::user()->entidadeAtiva->posts()->save($novoPost);

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
		$Post = Post::findOrFail($id);
		return view('post.show', compact('Post'));
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
	 * Metodo para dar Share em posts, replica o post com $id
	 * @param  $id 			Id do post a ser shareado
	 */
	public function getSharepost($id) 
	{
		$sourcePost = Post::findOrFail($id);
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		
		//Se o post a ser shareado for da entidadeAtiva em questão...
		if ($entidadeAtiva == $sourcePost->author) {
			App::abort(403, 'Voce nao tem permissão para sharear os proprios posts!');
		} 

		//Criando novo post, presenvando relações. e setando o shared_from
		$novoPost = $sourcePost->replicate();
		$novoPost->shared_from = $id;
		
		//Salvando o post para a entidadeAtiva atual
		$entidadeAtiva->posts()->save($novoPost);

		//Se tiver foto copiar ela tambem
		if ($sourcePost->fotos != null) {
			$novaFoto = $sourcePost->fotos->replicate();
			$novoPost->fotos()->save($novaFoto);
		}
		
		//Assegurando que as relações foram atualizadas
		Auth::user()->entidadeAtiva->push();
		return redirect('conectar');
	}

	/**
	 * Seta o like da entidadeAtiva atual para um post específico
	 *
	 * @param  [integer] id do post
	 * @return
	 */
	public function getLikepost($id) 
	{
		//Verifica se o post existe
		$post = Post::findOrFail($id);
		//Testo se o usuário está logado
		$user = Auth::user();
		$entidadeAtiva = $user->entidadeAtiva;
		
		//Se já tiver dado like no post com esse id,
		//consigo encontralo pelo Collention->find()
		$alreadyLiked = $entidadeAtiva->likePost->find($post->id);

		if (!$alreadyLiked) {
			//Salvando relação (Dando o like finalmente!)
			$entidadeAtiva->likePost()->attach($post->id);
		} else {
			$entidadeAtiva->likePost()->detach($post->id);
		}
		
		// Retorna a quantidade de likes para utilizar na view
	    return $post->getQuantidadeLikes();
	}
}
