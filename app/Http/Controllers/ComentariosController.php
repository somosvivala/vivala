<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Comentario;

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

		$perfil = Auth::user()->perfil;
		$post = Post::findOrFail($id);
		$conteudo = Input::get('conteudo', null);

		if (!$conteudo) {
			return json_encode(['error'=>'nao pode em branco']);
		}

		$comentario = new Comentario();
		$comentario->conteudo = $conteudo;
		$comentario->post_id = $post->id;
		//Salvando primeiro as relacoes com fk direto na tabela de comentarios
		//$post->comentarios()->save($comentario); //comentado pq tava dando erro

		//depois as relacoes polimorficas
		$perfil->comentarios()->save($comentario);

		return json_encode(['success'=>true]);
	}

	/**
	 * seta o like do perfil atual pra um comentario específico
	 *
	 * @param  [integer] id do comentario
	 * @return
	 */
	public function getLikecomentario($id) {
		//Verifica se o comentario existe
		$comentario = Comentario::findOrFail($id);
		//Testo se o usuário está logado
		$user = Auth::user();
		$perfil = $user->perfil;

		//Se já tiver dado like no comentario com esse id,
		//consigo encontralo pelo Collention->find()
		$alreadyLiked = $perfil->likeComentario->find($comentario->id);

		if (!$alreadyLiked) {
			//Salvando relação (Dando o like finalmente!)
			$perfil->likeComentario()->attach($comentario->id);
		}
		// Retorna a quantidade de likes para utilizar na view
	    return $comentario->getQuantidadeLikes();
	}
}
