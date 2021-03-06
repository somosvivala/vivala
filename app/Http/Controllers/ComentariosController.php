<?php namespace App\Http\Controllers;

use App;
use Auth;
use Input;
use App\Comentario;
use App\Notificacao;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
			return json_encode(['error'=>'Branco']);
		}

		$comentario = new Comentario();
		$comentario->conteudo = $conteudo;
		$comentario->post_id = $post->id;

		//depois as relacoes polimorficas
		$entidadeAtiva->comentarios()->save($comentario);

                // Aumenta a relevancia e a "aceleracao" de relevancia #GOTRENDING
                $post->relevancia += $post->relevancia_rate;
                $post->relevancia_rate += $post->relevancia_rate;
                $post->push();

		//Só levantar uma notificacao se nao for em um post seu ou de alguma de suas entidades
		if($entidadeAtiva->user->id != $post->author->user->id)
		{
			//Criando nova notificacao
			$lang = App::getLocale();
			switch($lang){
				case 'pt':
					$string[0] = 'Comentaram sua Postagem';
					$string[1] = ' comentou sua postagem.';
				break;
				case 'en':
					$string[0] = 'Post Comment';
					$string[1] = ' commented your post.';
				break;
				default:
					$string[0] = 'Comentaram sua Postagem';
					$string[1] = ' comentou sua postagem.';
			}
			$novaNotificacao = Notificacao::create([
				'titulo'			=>	$string[0],
				'mensagem' 			=> 	$entidadeAtiva->apelido . $string[1],
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
			// É um like, logo o like vai para o estado 1
			$tipoLikeUser = true;

                        // Aumenta a relevancia do post
                        $comentario->post->relevancia += $comentario->post->relevancia_rate;
                        $comentario->post->push();

			//Só levantar uma notificacao se o like for em um
			//comentario que nao seja seu ou de alguma de suas entidades
			if($entidadeAtiva->user->id != $comentario->author->user->id)
			{
				$lang = App::getLocale();
				switch($lang){
					case 'pt':
						$string[0] = 'Curtiram seu Comentário';
						$string[1] = ' curtiu seu comentário.';
					break;
					case 'en':
						$string[0] = 'Comment Like';
						$string[1] = ' likes your comment.';
					break;
					default:
						$string[0] = 'Curtiram seu Comentário';
						$string[1] = ' curtiu seu comentário.';
				}
				//Criando nova notificacao
				$novaNotificacao = Notificacao::create([
					'titulo'			=>	$string[0],
					'mensagem' 			=> 	$entidadeAtiva->apelido . $string[1],
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
			// É um dislike, logo o like volta para para o estado 0
			$tipoLikeUser = false;
		}

		// Retorna a quantidade de likes para utilizar na view e se o user deu like ou deslike
		return array('qtdLikes' => $comentario->getQuantidadeLikes(), 'tipoLikeUser' => $tipoLikeUser);
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
