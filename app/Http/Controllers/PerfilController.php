<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CropPhotoRequest;
use App\Http\Requests\EditarPerfilRequest;
use App\User;
use Auth;
use Session;
use App;
use Input;
use Carbon\Carbon;
use App\PrettyUrl;
use App\Foto;
use App\Post;

class PerfilController extends ConectarController {


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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$perfil = $user->perfil;
		$follow = $perfil->followPerfil;
		$followedBy = $perfil->followedBy;

		$empresas = $user->empresas;

		Session::put('entidadeAtiva_id', $perfil->id);
    	Session::put('entidadeAtiva_tipo', 'perfil');


		return view('perfil.index', compact('user', 'perfil', 'follow', 'followedBy'))
		->with('sugestoesEmpresas', $empresas); // Menu lateral de sugestoes
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id=0)
	{
		$user = Auth::user();
		$perfil = $user->perfil;

		return view('perfil.edit', compact('user', 'perfil'));
	}

	/**
	 * Update the User in the database
	 * @param  Integer                $id  		id do usuario
	 * @param  EditarPerfilRequest    $request  Request do form
	 * @return 									Redireciona para home
	 */
	public function update($id, EditarPerfilRequest $request)
	{

		//Salva dados referentes ao User
		$user = User::findOrFail($id);
		$user->username = $request->input('username');
		$user->save();

		//Salva dados referentes ao User
		$perfil = $user->perfil;
		$aniversario = $request->input('aniversario');
		$perfil->aniversario = Carbon::createFromFormat('d/m/Y', $aniversario);
		$perfil->cidade_natal = $request->input('cidade_natal');
		$perfil->prettyUrl()->update([
			'url' => $request->input('url'),
			'tipo' => 'usuario'
		]);

		//Salvando foto de perfil;
		$file = Input::file('image');
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) {

	        	if ($perfil->avatar) {
		        	/* Settando tipo da foto atual para null */
		        	$currentAvatar = $perfil->avatar;
		        	$currentAvatar->tipo = null;
		        	$currentAvatar->save();
	        	}

	        	$foto = new Foto([
	        			'path' => $destinationPath . $filename,
	        			'tipo' => 'avatar' ]);
	        	$perfil->fotos()->save($foto);
	        }
	    }

		$perfil->save();

		return redirect('home');
	}

	/**
	 * Mostra o perfil de um usuario.
	 * @param   String		$prettyUrl       se acessado diretamente, passa a suposta prettyUrl
	 * @return  View       	Perfil do usuario em questao
	 */
	public function showUserProfile($prettyUrl = null)
	{
		//se nao veio nada na sessao e nem na url
		if(!$prettyUrl && !Session::has('perfil')) {
			App::abort(404);
		}

		//se o dado da sessao for diferente da prettyUrl digitada, pegar da url
		$perfil = Session::get('perfil', null);
		if (is_null($perfil) || $prettyUrl != $perfil->getUrl()) {
			Session::forget('perfil');
			$prettyUrlObj = PrettyUrl::all()->where('url', $prettyUrl)->first();

			//Se parametro for uma prettyURL, pegar objeto Perfil.
			if (!is_null($prettyUrlObj)) {
				$perfil = App\Perfil::find($prettyUrlObj->prettyurlable_id);
			} else {
				App::abort(404);
			}
		}

		$user = $perfil->user;
		$follow = $perfil->followPerfil;
		$followedBy = $perfil->followedBy;
		return view('perfil.index', compact('user', 'perfil', 'follow', 'followedBy'));
	}

	/**
	 * [updatePhoto description]
	 * @param  Integer Id do usuário
	 * @return ??
	 */
	public function updatePhoto($id) {

		//Salva dados referentes ao User
		$user = User::findOrFail($id);

		//Salvando imagem no avatar do usuario;
		$file = Input::file('file');
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) {
	        	$user->update(['avatar' => $filename]);

	        	//essa rota esta sendo usada?
	        	//
	        	dd('se pa nao, updatePhoto');


	        }
	    }
	}

	/**
	 * Seta o like da entidadeAtiva atual para um post específico
	 *
	 * @param  [integer] id do post
	 * @return
	 */
	public function getLikepost($id) {
		//Verifica se o post existe
		$post = Post::findOrFail($id);
		//Testo se o usuário está logado
		$user = Auth::user();
		$entidadeAtiva = $user->entidadeAtiva;
		
		//Se já tiver dado like no post com esse id,
		//consigo encontralo pelo Collention->find()
		$alreadyLiked = $entidadeAtiva->likePost->find($post->id);

		if (!$alreadyLiked) {
			//Salvando relação (Dando o like finalmente!)
			$entidadeAtiva->likePost()->attach($post->id);
		}
		
		// Retorna a quantidade de likes para utilizar na view
	    return $post->getQuantidadeLikes();
	}

}
