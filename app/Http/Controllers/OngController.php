<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarOngRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CropPhotoRequest;
use Session;
use App\Ong;
use Auth;
use Request;
use App;
use Carbon\Carbon;
use App\PrettyUrl;
use Input;
use App\Foto;


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
        $ong->url = $ong->getUrl();
		return view('ong.edit', compact('user', 'ong'));
	}

	/**
	 * Atualiza a Ong e a prettyUrl da ong
	 * @param  Integer                    $id      Id da Ong
	 * @param  Requests\EditarOngRequest $request Request personalizado da Ong (trata tamanho do input)
	 * @return View                             View da Ong modificada
	 */
    public function update($id, Requests\EditarOngRequest $request)
    {
        $ong = Ong::findOrFail($id);

        $ong->update($request->all());

        //Salvando foto da ong;
		$file = Input::file('image');
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) {
	        	
	        	/* Settando tipo da foto atual para null */
	        	$currentAvatar = $ong->avatar;
	        	$currentAvatar->tipo = null;
	        	$currentAvatar->save();

	        	$foto = new Foto([
	        			'path' => $destinationPath . $filename,
	        			'tipo' => 'avatar' ]);
	        	$ong->fotos()->save($foto);
	        }
	    }

        //Atualiza a url correspondente
        $ong->prettyUrl()->update([ 'url' => $request->url ]);
		return view('ong.show', compact('ong'));
    }


    /**
	 * [updatePhoto description]
	 * @param  Integer Id do usuário
	 * @return ??
	 */
	public function cropPhoto($id, CropPhotoRequest $request) {

		$ong = Ong::findOrFail($id);

		$file = Input::file('image_file_upload');
	    if ($file->isValid()) {

			$widthCrop = $request->input('w');
			$heightCrop = $request->input('h');
			$xSuperior = $request->input('x');
			$ySuperior = $request->input('y');

			$destinationPath = public_path() . '/uploads/';
			$extension = Input::file('image_file_upload')->getClientOriginalExtension(); // Pega o formato da imagem
			$fileName = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName()).'.'.$extension;

			$file = \Image::make( $file->getRealPath() )->crop($widthCrop, $heightCrop, $xSuperior, $ySuperior);
	        $upload_success = $file->save($destinationPath.$fileName);

			//Salvando imagem no avatar do usuario;
	        if ($upload_success) {

	      		/* Settando tipo da foto atual para null, checando se existe antes */
	      		if ($ong->avatar) {	
		        	$currentAvatar = $ong->avatar;
		        	$currentAvatar->tipo = null;
		        	$currentAvatar->save();
	      		}

	        	$foto = new Foto([
	        			'path' => $fileName,
	        			'tipo' => 'avatar' ]);
	        	$ong->fotos()->save($foto);

	      		return redirect('ong/'.$ong->id.'/edit');

	        }
	    }
	}


	private function formatFileNameWithUserAndTimestamps($filename)
	{
		$timestamp = Carbon::now()->getTimestamp() . '_';
		$user_preffix = Auth::id() . '_';

		return $user_preffix . $timestamp .$filename;
	}
	
}
