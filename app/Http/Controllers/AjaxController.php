<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Facades
use Auth;
use Input;

//Models
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\Notificacao;


class AjaxController extends VivalaBaseController {

	/**
	 * construtor seguro.
	 */
	public function __construct(){
	    //Só passa se estiver logado
	    $this->middleware('auth');
	}

	/**
	 * Estabele a relação de seguir um perfil
	 * @param  String 	    $id 		Id do perfil a ser seguido
	 * @return JSON     	Resultado da requisicao
	 */
	public function getFollowperfil($id) {

		//$entidadeAtiva do usuario logado.
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		$perfil = Perfil::findOrFail($id);

		//se ja nao seguir esse perfil
		if (!$entidadeAtiva->followPerfil->find($perfil->id)) {
			$entidadeAtiva->followPerfil()->attach($perfil->id);
			$entidadeAtiva->push();

			//Criando nova notificacao
			$novaNotificacao = Notificacao::create([
				'titulo'			=>	'Voce tem um novo seguidor',
				'mensagem' 			=> 	$entidadeAtiva->apelido . ' agora está te seguindo e vai receber seus posts',
				'tipo_notificacao'	=>	'seguidor',
				'url'				=>	$entidadeAtiva->getUrl()
				]);

			//associando a entidadeAtiva com o from e o $perfil seguido como target
			$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
			$perfil->notificacoes()->save($novaNotificacao);
			$novaNotificacao->push();
		}

		$return['success'] = true;
		return json_encode($return);
	}

	/**
	 * Estabele a relação de seguir uma empresa
	 * @param  String 	    $id 		Id da empresa a ser seguida
	 * @return JSON     	Resultado da requisicao
	 */
	public function getFollowempresa($id) {

		//$entidadeAtiva do usuario logado.
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		$empresa = Empresa::findOrFail($id);

		//se ja nao seguir essa empresa
		if (!$entidadeAtiva->followEmpresa->find($empresa->id)) {
			$entidadeAtiva->followEmpresa()->attach($empresa->id);
			$entidadeAtiva->push();

			//Criando nova notificacao
			$novaNotificacao = Notificacao::create([
				'titulo'			=>	'Voce tem um novo seguidor',
				'mensagem' 			=> 	$entidadeAtiva->apelido . ' agora está te seguindo e vai receber seus posts',
				'tipo_notificacao'	=>	'seguidor',
				'url'				=>	$entidadeAtiva->getUrl()
				]);

			//associando a entidadeAtiva com o from e o $empresa seguido como target
			$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
			$empresa->notificacoes()->save($novaNotificacao);
			$novaNotificacao->push();
		}

		$return['success'] = true;
		return json_encode($return);
	}

	/**
	 * Estabele a relação de seguir uma ong
	 * @param  String 	    $id 		Id da ong a ser seguida
	 * @return JSON     	Resultado da requisicao
	 */
	public function getFollowong($id) {

		//$entidadeAtiva do usuario logado.
		$entidadeAtiva = Auth::user()->entidadeAtiva;
		$ong = Ong::findOrFail($id);

		//se ja nao seguir essa ong
		if (!$entidadeAtiva->followOng->find($ong->id)) {
			$entidadeAtiva->followOng()->attach($ong->id);
			$entidadeAtiva->push();

			//Criando nova notificacao
			$novaNotificacao = Notificacao::create([
				'titulo'			=>	'Voce tem um novo seguidor',
				'mensagem' 			=> 	$entidadeAtiva->apelido . ' agora está te seguindo e vai receber seus posts',
				'tipo_notificacao'	=>	'seguidor',
				'url'				=>	$entidadeAtiva->getUrl()
				]);

			//associando a entidadeAtiva com o from e o $ong seguido como target
			$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
			$ong->notificacoes()->save($novaNotificacao);
			$novaNotificacao->push();

		}

		$return['success'] = true;
		return json_encode($return);
	}


	/**
	 * Remove a relação de seguir uma ong
	 * @param  String 	    $id 		Id da ong a ser ser unfollowed
	 * @return JSON     	Resultado da requisicao
	 */
	public function getUnfollowong($id) {

		//$entidadeAtiva do usuario logado.
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		//se ja nao seguir essa ong
		if ($entidadeAtiva->followOng->find($id)) {
			$entidadeAtiva->followOng()->detach($id);
			$entidadeAtiva->push();
		}

		$return['success'] = true;
		return json_encode($return);
	}

	/**
	 * Remove a relação de seguir uma empresa
	 * @param  String 	    $id 		Id da empresa a ser ser unfollowed
	 * @return JSON     	Resultado da requisicao
	 */
	public function getUnfollowempresa($id) {

		//$entidadeAtiva do usuario logado.
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		//se ja nao seguir essa ong
		if ($entidadeAtiva->followEmpresa->find($id)) {
			$entidadeAtiva->followEmpresa()->detach($id);
			$entidadeAtiva->push();
		}

		$return['success'] = true;
		return json_encode($return);
	}

	/**
	 * Remove a relação de seguir uma perfil
	 * @param  String 	    $id 		Id da perfil a ser ser unfollowed
	 * @return JSON     	Resultado da requisicao
	 */
	public function getUnfollowperfil($id) {

		//$entidadeAtiva do usuario logado.
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		//se ja nao seguir essa ong
		if ($entidadeAtiva->followPerfil->find($id)) {
			$entidadeAtiva->followPerfil()->detach($id);
			$entidadeAtiva->push();
		}

		$return['success'] = true;
		return json_encode($return);
	}

	/**
	 * Retorna ate 3 paginas dentre as Ongs/Empresas de um Usuario
	 * @return Array<Ong|Empresa> 
	 */
	public function getPaginasmenu() 
	{
		$paginas = Auth::user()->paginas;
		$paginas = $paginas->take(3);
		return $paginas;
	}





}
