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
		return view("quiz.interesses", compact('interesses'))->with(['passo'=>1]);
	}

	/**
	 * Retorna a view de adicionar uma foto
	 */
	public function getPersonalize()
	{
		$foto = Auth::user()->perfil->getAvatarUrl();
		return view("quiz.personalizefoto", compact("foto") )->with(['passo'=>2]);
	}


	/**
	* Retorna a view de adicionar detalhes (Apelido, cidade de origem, etc)
	*/
	public function getContemais()
	{
		return view("quiz.contemais")->with(['passo'=>3]);
	}

	/**
	 * Retorna a view de asugestão de viajantes
	 */
	public function getPessoasinteressantes()
	{
		$sugestoesPessoasInteressantes = Perfil::getSugestoes(Auth::user());
		return view("quiz.pessoasinteressantes", compact("sugestoesPessoasInteressantes") )->with(['passo'=>4]);
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
