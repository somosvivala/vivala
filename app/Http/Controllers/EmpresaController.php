<?php namespace App\Http\Controllers;

use App\Http\Requests\EditarEmpresaRequest;
use App\Http\Requests\CropPhotoRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\PrettyUrl;
use App\Empresa;
use Request;
use Session;
use Input;
use Auth;
use App;
use Carbon\Carbon;


class EmpresaController extends Controller {

	/**
	 * Mostra a pagina inicial da Empresa
	 * @param   String 			 $prettyUrl 	  Se acessado diretamente, leva a suposta prettyUrl
	 * @return  View             index.blade.php
	 */
	public function index($prettyUrl = null) {

		//se nao veio nada na sessao e nem na url
		if(!$prettyUrl && !Session::has('empresa')) {
			App::abort(404);
		}

		//se o dado da sessao for diferente da prettyUrl digitada, pegar da url
		$empresa = Session::get('empresa', null);
		if (is_null($empresa) || $prettyUrl != $empresa->getUrl()) {
			Session::forget('empresa');

			$prettyUrlObj = PrettyUrl::all()->where('url', $prettyUrl)->first();

			//Se parametro for uma prettyURL, pegar objeto Empresa.
			if (!is_null($prettyUrlObj)) {
				$empresa = App\Empresa::find($prettyUrlObj->prettyurlable_id);
			} else {
				App::abort(404);
			}
		}

		// Verifica se o usuário logado tem permissão de edição da Empresa
		// Caso possua, habilita uma flag de edição para a view.
		if (Auth::user()->id == $empresa->user->id) {
			$empresa->podeEditar = true;
		} else {
			$empresa->podeEditar = false;
		}
		return view('empresa.show', compact('empresa'));
	}


	/**
	 * Form de inserir Empresa.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('empresa.create');
	}

	/**
	 * Salva a Empresa no BD e redireciona pra home
	 * Criando também a prettyUrl associada a essa Empresa
	 *
	 * @return Response
	 */
	public function store()
	{
		$novaEmpresa = Auth::user()->empresas()->create(Request::all());

		$novaPrettyUrl = new PrettyUrl();
        $novaPrettyUrl->tipo = 'empresa';

        //se ja nao existir essa prettyUrl
        $novaPrettyUrl->url = $novaPrettyUrl->giveAvailableUrl($novaEmpresa->nome);
        $novaEmpresa->prettyUrl()->save($novaPrettyUrl);

		return redirect('home');
	}

	/**
	 * Mostra a empresa
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$empresa = Empresa::findOrFail($id);
		return view('empresa.show', compact('empresa'));
	}

	/**
	 * Tela de edição da empresa
	 *
	 */
	public function edit($id)
    {
		$user = Auth::user();
        $empresa = Empresa::findOrFail($id);
        $empresa->url = $empresa->getUrl();
        return view('empresa.edit', compact('empresa', 'user') );
    }

	/**
	 * Atualiza a Empresa e a prettyUrl da empresa
	 * @param  Integer                    $id      Id da Empresa
	 * @param  Requests\EditarEmpresaRequest $request Request personalizado da Empresa (trata tamanho do input)
	 * @return View                             View da Empresa modificada
	 */
    public function update($id, Requests\EditarEmpresaRequest $request)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());

        //Salvando foto da empresa;
		$file = Input::file('image');
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) {
	        	$empresa->foto = $destinationPath . $filename;
	        	$empresa->save();
	        }
	    }

        //Atualiza a url correspondente
        $empresa->prettyUrl()->update([ 'url' => $request->url ]);
		return view('empresa.show', compact('empresa'));
    }

    /**
	 * [updatePhoto description]
	 * @param  Integer Id do usuário
	 * @return ??
	 */
	public function cropPhoto($id, CropPhotoRequest $request) {

		$empresa = Empresa::findOrFail($id);

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
	        	$empresa->foto = $fileName;
				$empresa->save();
	      		return redirect('empresa/'.$empresa->id.'/edit');

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
