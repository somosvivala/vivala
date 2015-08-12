<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Interesse;
use App\Perfil;
use Auth;



class QuizController extends VivalaBaseController {

	/**
	 * Construtor seguro
	 */
	public function __construct() 
	{
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	/**
	 * Retorna a view inicial do Quiz
	 */
	public function getIndex() 
	{
		$interesses = Interesse::all();
		return view("quiz.interesses", compact('interesses'));
	}

	/**
	 * Recebe por POST o $id do Perfil e atrela a esse perfil a lista de Interesses
	 * dentro de  do array 'interesses'
	 */
	public function postInteresses($id, Request $request) 
	{
		$perfil = Perfil::findOrFail($id);
		$interesses = $request->get('interesses');

		//Iterando sob os valores do checkbox de interesses
		foreach ($interesses as $interesse) {
			
			$int = Interesse::all()->where('nome', $interesse)->first();
			if ($int) {

				//Se ja nao tive esse interesse adiciona-o a lista de interesses
				if (!$perfil->interesses->find($int)) {
					$perfil->interesses()->attach($int);
				}
			}
		}

		$perfil->push();
	}


}
