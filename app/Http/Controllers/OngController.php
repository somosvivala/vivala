<?php namespace App\Http\Controllers;

use App\Http\Requests;
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

		if(!$prettyUrl && !Session::has('ong')) {
			App::abort(404);
		}

		if (Session::has('ong')) {
			$ong = Session::get('ong');
		} else {
			
			/**
			 * Procurando tanto uma prettyUrl quanto uma ong com o ID..
			 * TODO: ao salvar ong criar PrettyUrl hash(id) ??
			 */
			$prettyUrlObj = PrettyUrl::all()->where('url', $prettyUrl)->first();
			
			//Se parametro for uma prettyURL, pegar objeto Ong.
			//Se nao, procura por um match de ID em Ongs.
			if (!is_null($prettyUrlObj)) {
				$ong = App\Ong::find($prettyUrl->prettyurlable_id);
			} else {
				$prettyUrlObj = PrettyUrl::find($prettyUrl);
				if (!is_null($prettyUrlObj)) {
					$ong = App\Ong::find($prettyUrlObj->prettyurlable_id);
				} else {
					App::abort(404);
				}
			}
		}
	
		dd('inside index of OngController.php -> ', $ong);
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
	 * Salva a Ong no BD e redireciona pra home
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
	
}
