<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Comentario;
use App\Notificacao;

use Input;

class ComentariosController extends VivalaBaseController {

	/**
	 * construtor seguro.
	 */
	public function __construct(){
	    //Só passa se estiver logado
	    $this->middleware('auth');
	}


	/**
	 * Recebe por POST o ID do Post que esta sendo comentado
	 * @param  String 	 $id
	 * @return JSON      Retorno da requisicao
	 */
	public function postSavecomentario($id) {

		$entidadeAtiva = Auth::user()->entidadeAtiva;
		$post = Post::findOrFail($id);
		$conteudo = Input::get('conteudo', null);

		if (!$conteudo) {
			return json_encode(['error'=>'nao pode em branco']);
		}

		$comentario = new Comentario();
		$comentario->conteudo = $conteudo;
		$comentario->post_id = $post->id;

		//depois as relacoes polimorficas
		$entidadeAtiva->comentarios()->save($comentario);

		//Só levantar uma notificacao se nao for em um post seu ou de alguma de suas entidades
		if($entidadeAtiva->user->id != $post->author->user->id)
		{
			//Criando nova notificacao
			$novaNotificacao = Notificacao::create([
				'titulo'			=>	'Comentaram seu post',
				'mensagem' 			=> 	$entidadeAtiva->apelido . ' comentou no seu post',
				'tipo_notificacao'	=>	'comentario',
				'url'				=>	$post->url
				]);
	
			//associando a entidadeAtiva com o from e o autor do post comentado como target
			$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
			$post->author->notificacoes()->save($novaNotificacao);
			$novaNotificacao->push();
		}
		
		return json_encode(['success'=>true]);
	}

	/**
	 * seta o like da entidadeAtiva atual pra um comentario específico
	 *
	 * @param  [integer] id do comentario
	 * @return
	 */
	public function getLikecomentario($id) {
		//Verifica se o comentario existe
		$comentario = Comentario::findOrFail($id);
		//Testo se o usuário está logado
		$user = Auth::user();
		$entidadeAtiva = $user->entidadeAtiva;

		//Se já tiver dado like no comentario com esse id,
		//consigo encontralo pelo Collention->find()
		$alreadyLiked = $entidadeAtiva->likeComentario->find($comentario->id);

		if (!$alreadyLiked) {
			//Salvando relação (Dando o like finalmente!)
			$entidadeAtiva->likeComentario()->attach($comentario->id);

			//Só levantar uma notificacao se o like for em um 
			//comentario que nao seja seu ou de alguma de suas entidades
			if($entidadeAtiva->user->id != $comentario->author->user->id)
			{
				//Criando nova notificacao
				$novaNotificacao = Notificacao::create([
					'titulo'			=>	'Curtiram seu comentario',
					'mensagem' 			=> 	$entidadeAtiva->apelido . ' curtiu seu comentario',
					'tipo_notificacao'	=>	'like_comentario',
					'url'				=>	$comentario->post->url
					]);
			
				//associando a entidadeAtiva com o from e o autor do comentario likeado como target
				$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
				$comentario->author->notificacoes()->save($novaNotificacao);
				$novaNotificacao->push();
			}


		} else {
			//se ja estiver dando like, remover like
			$entidadeAtiva->likeComentario()->detach($comentario->id);
		}

		// Retorna a quantidade de likes para utilizar na view
	    return $comentario->getQuantidadeLikes();
	}


	/**
	 * Devolve ate 3 ultimos comentarios de um post
	 * @param  String 	    	id do Post
	 */
	public function getUltimoscomentarios($id) {
		//Verifica se o post existe
		$post = Post::findOrFail($id);
		return $post->comentarios()->orderBy('created_at','DESC')->limit(3)->get();
	}


}
