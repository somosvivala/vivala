<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Perfil;

class AjaxController extends Controller {

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
	public function getFollow($id) {

		//$perfil do usuario logado.
		$perfil = Auth::user()->perfil;
		$perfil->follow()->attach($id);
		$perfil->save();

		$return['success'] = true;

		return json_encode($return);
	}
}
