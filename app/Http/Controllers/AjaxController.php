<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Perfil;
use Input;

class AjaxController extends VivalaBaseController {

	/**
	 * construtor seguro.
	 */
	public function __construct(){
	    //Só passa se estiver logado
	    $this->middleware('auth');
	}

	/**
	 * Estabele a relação de seguir outro perfil
	 * @param  String 	    $id 		Id do perfil a ser seguido
	 * @return JSON     	Resultado da requisicao
	 */
	public function getFollowperfil($id) {

		//$perfil do usuario logado.
		$perfil = Auth::user()->perfil;
		$perfil->followPerfil()->attach($id);
		$perfil->save();
		$return['success'] = true;

		return json_encode($return);
	}

	/**
	 * Estabele a relação de seguir uma empresa
	 * @param  String 	    $id 		Id da empresa a ser seguida
	 * @return JSON     	Resultado da requisicao
	 */
	public function getFollowempresa($id) {

		//$perfil do usuario logado.
		$perfil = Auth::user()->perfil;
		$perfil->followEmpresa()->attach($id);
		$perfil->save();
		$return['success'] = true;

		return json_encode($return);
	}

	/**
	 * Estabele a relação de seguir uma ong
	 * @param  String 	    $id 		Id da ong a ser seguida
	 * @return JSON     	Resultado da requisicao
	 */
	public function getFollowong($id) {

		//$perfil do usuario logado.
		$perfil = Auth::user()->perfil;
		$perfil->followOng()->attach($id);
		$perfil->save();
		$return['success'] = true;

		return json_encode($return);
	}

}
