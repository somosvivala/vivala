<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarOngRequest;
use App\Http\Controllers\Controller;

use Session;
use App\Ong;
use Auth;
use Request;
use App;
use Carbon\Carbon;
use App\PrettyUrl;


class OngController extends Controller {

	/**
	 * Mostra a pagina da ong
	 * @param   String 			 $prettyUrl 	  Se acessado diretamente, leva a suposta prettyUrl
	 * @return  View             index.blade.php
	 */
	public function index($prettyUrl = null) {

		//se nao veio nada na sessao e nem na url
		if(!$prettyUrl && !Session::has('ong')) {
			App::abort(404);
		}

		//se o dado da sessao for diferente da prettyUrl digitada, pegar da url
		$ong = Session::get('ong', null);
		if (is_null($ong) || $prettyUrl != $ong->getUrl()) {
			Session::forget('ong');
			$prettyUrlObj = PrettyUrl::all()->where('url', $prettyUrl)->first();

			//Se parametro for uma prettyURL, pegar objeto Ong.
			if (!is_null($prettyUrlObj)) {
				$ong = App\Ong::find($prettyUrlObj->prettyurlable_id);
			} else {
				App::abort(404);
			}			
		}


		// Verifica se o usuário logado tem permissão de edição da Ong.
		// Caso possua, habilita uma flag de edição para a view.
		if (Auth::user()->id == $ong->user->id) {
			$ong->podeEditar = true;
		} else {
			$ong->podeEditar = false;
		}
		return view('ong.show', compact('ong'));
	}

	/**
	 * Form de inserir Ong.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ong.create');
	}

	/**
	 * Salva a Ong no BD e redireciona pra home, 
	 * criando também a prettyUrl associada com essa Ong
	 *
	 * @return Response
	 */
	public function store()
	{
		$novaOng = Auth::user()->ongs()->create(Request::all());

		$novaPrettyUrl = new PrettyUrl();
        $novaPrettyUrl->tipo = 'ong';

        //se ja nao existir uma ong com essa prettyUrl
        $novaPrettyUrl->url = $novaPrettyUrl->giveAvailableUrl($novaOng->nome);
        $novaOng->prettyUrl()->save($novaPrettyUrl);
		
		return redirect('home');
	}

	/**
	 * Mostra a ong
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$ong = Ong::findOrFail($id);
		return view('ong.show', compact('ong'));
	}

	public function edit($id=0)
	{
		$user = Auth::user();
		$ong = Ong::findOrFail($id);

		return view('ong.edit', compact('user', 'ong'));
	}

    public function update($id, Requests\EditarOngRequest $request)
    {
        $ong = Ong::findOrFail($id);

        $ong->update($request->all());

		return view('ong.show', compact('ong'));
    }
	
}
