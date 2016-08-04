<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuizConteMaisRequest;

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
            $interesses['estilo'] = Interesse::all()->where('categoria', 'estilo');
            $interesses['companhia'] = Interesse::all()->where('categoria', 'companhia');
            $interesses['ambiente'] = Interesse::all()->where('categoria', 'ambiente');
            $interesses['regioes'] = Interesse::all()->where('categoria', 'regioes');
            $interesses['motivacoes'] = Interesse::all()->where('categoria', 'motivacoes');
            $interesses['eventos'] = Interesse::all()->where('categoria', 'eventos');
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
		//$sugestoesPessoasIinteressantes = Perfil::getSugestoes(Auth::user()->entidadeAtiva, 3, 5);
            $sugestoesPessoasInteressantes = Perfil::where('id','<',10)->take(5)->get();
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
                
                if ($interesses) {
                
                    //Iterando sob os valores do checkbox de interesses
                    foreach ($interesses as $interesseID) {

                            $int = Interesse::findOrFail($interesseID);
                            if ($int) {

                                    //Se ja nao tiver esse acossiado a esse perfil
                                    //adiciona-o a lista de interesses desse perfil
                                    if (!$perfil->interesses->find($int)) {
                                            $perfil->interesses()->attach($int);
                                    }
                            }
                    }

                    $perfil->push();
                }
	}

	/**
	 * Recebe por POST o $id do Perfil e faz update das informações do perfil
	 */
	public function postContemais($id, QuizConteMaisRequest $request)
	{
		$perfil = Perfil::findOrFail($id);
		$perfil->update($request->all());
		$perfil->push();
	}



}
