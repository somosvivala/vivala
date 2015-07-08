<?php namespace App\Http\Controllers;
use Auth;

class HomeController extends ConectarController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| Mostra a tela inicial, um feed de noticias baseado gostos do usuario
	| e nos compartilhamentos das entidades que esse usuário segue
	|
	*/

	/**
	 * Mostra o feed de noticias
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');

	}

}
