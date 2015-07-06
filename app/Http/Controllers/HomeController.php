<?php namespace App\Http\Controllers;
use Auth;

class HomeController extends ConectarController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
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

		return view('home', compact('facebookData','perfil','ongs','empresas'))
		->with('sugestoesEmpresas', $empresas); // Menu lateral de sugestoes

	}

}
