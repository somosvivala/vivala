<?php namespace App\Http\Controllers;

use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigController extends Controller {
	
	public function __construct(){
	    //Só passa se estiver logado
	    $this->middleware('auth');
	}

	/**
	* Show the application dashboard to the user.
	*
	* @return Response
	*/
	public function index()
	{
		//Traz as informações do facebook salvas
		$user = Auth::user();
		// $facebookData = $user->facebookData;
		$perfil = $user->perfil;
		$ongs = $user->ongs;
		$empresas = $user->empresas;

		return view('config', compact('facebookData','perfil','ongs','empresas'));

	}

}
