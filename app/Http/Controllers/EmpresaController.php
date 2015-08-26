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
use App\Foto;

class EmpresaController extends ViajarController {

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

        //Verificando se usuario logado é owner da empresa atual
        //TODO: Model de permissoes.. 
        if ($empresa->user->id != $user->id) {
        	//Criar mensagens de erro padrão em configurações??
	        App::abort(403, 'Ops, aparentemente voce não tem permissão para editar as informações dessa empresa');
        }

		//Trocando entidadeAtiva para essa empresa
        Session::put('entidadeAtiva_id', $empresa->id);
    	Session::put('entidadeAtiva_tipo', 'empresa');

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

	        	/* Settando tipo da foto atual para null */
	        	$currentAvatar = $empresa->avatar;
	        	$currentAvatar->tipo = null;
	        	$currentAvatar->save();

	        	$foto = new Foto([
	        			'path' => $destinationPath . $filename,
	        			'tipo' => 'avatar' ]);
	        	$empresa->fotos()->save($foto);
	        }
	    }

        //Atualiza a url correspondente
        $empresa->prettyUrl()->update([ 'url' => $request->url ]);
		return view('empresa.show', compact('empresa'));
    }

}
