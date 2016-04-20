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
use App\Perfil;

class PerfilController extends ConectarController {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$user = Auth::user();
		$perfil = $user->entidadeAtiva;
		$follow = $perfil->followPerfil;
		$followedBy = $perfil->followedByPerfil;
		$posts = $perfil->posts;

		//Nao adicionando entidadeAtiva como sendo perfil, ou seja, mostrando o perfil
		//da entidadeAtiva logada.

		// Session::put('entidadeAtiva_id', $perfil->id);
    	// Session::put('entidadeAtiva_tipo', 'perfil');

		return view('perfil.index', compact('user', 'perfil', 'follow', 'followedBy', 'posts'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id=0) {
		$user = Auth::user();
		$perfil = $user->perfil;
    	        $foto = $perfil->getAvatarUrl();
                $apelido = $perfil->apelido;

                if ($perfil->id != $id)
                {
                     return App::abort(403, 'Ops, aparentemente voce não tem permissão para editar esse perfil');
                }

                //Trocando entidadeAtiva para perfil
		Session::put('entidadeAtiva_id', $perfil->id);
                Session::put('entidadeAtiva_tipo', 'perfil');

		return view('perfil.edit', compact('user', 'perfil', 'foto', 'apelido'));
	}

	/**
	 * Update the Perfil in the database
	 * @param  Integer                $id  		id do Usuario
	 * @param  EditarPerfilRequest    $request  Request do form
	 * @return 									Redireciona para home
	 */
	public function update($id, EditarPerfilRequest $request) {

		//Salva dados referentes ao User
		$user = User::findOrFail($id);
		$user->username = $request->input('username');
		$user->save();

		//Salva dados referentes ao User
		$perfil = $user->perfil;
		$aniversario = $request->input('aniversario');
		$perfil->aniversario = Carbon::createFromFormat('d/m/Y', $aniversario);
		$perfil->cidade_natal = $request->input('cidade_natal');
		$perfil->cidade_atual = $request->input('cidade_atual');
		$perfil->apelido = $request->input('apelido');
		$perfil->descricao_curta = $request->input('descricao_curta');
		$perfil->descricao_longa = $request->input('descricao_longa');

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
	public function showUserProfile($prettyUrl = null) {
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

				if (is_numeric($prettyUrl)) {
					$perfil = App\Perfil::findOrFail($prettyUrl);
				} else {
					App::abort(404);
				}
			}
		}

		$user = $perfil->user;
		$follow = $perfil->followPerfil;
		$followedBy = $perfil->followedByPerfil;
		$entidadeAtiva = $perfil;

                $posts = $entidadeAtiva->posts;

		return view('perfil.index', compact('user', 'perfil', 'follow', 'followedBy', 'posts', 'entidadeAtiva'));
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

		if (!$apelidoOngreadyLiked) {
			//Salvando relação (Dando o like finalmente!)
			$entidadeAtiva->likePost()->attach($post->id);
		}

		// Retorna a quantidade de likes para utilizar na view
	    return $post->getQuantidadeLikes();
	}

	/**
	 * Seta o like da entidadeAtiva atual para um post específico
	 *
	 * @param  [integer] id do post
	 * @return
	 */
	public function getSetapoiador($id) {
            $perfil = Perfil::findOrFail($id);
            if(Auth::user()->isAdmin()) {
                if($perfil->apoiador == 'B'){
                    $perfil->apoiador = null;
                }else{
                    $perfil->apoiador = 'B';
                }
                $perfil->push();
            }

	    return 'success';
	}

	/**
	 * retorna lista de perfis
	 * @param  Request $request [string]
	 * @return [array]
	 */
	public function getQueryList() {
		$query = Input::get('query');

		$perfils = Perfil::where('nome_completo', 'ilike', "%{$query}%")
			//->orWhere('apelido', 'ilike', "%{$query}%")
			->take(10)->limit(10)
			->get();

		foreach ($perfils as &$perfil) {
			$perfil->photo = $perfil->getAvatarUrl();
		}

		return view('perfil._listaperfis', compact('perfils', 'query'));
	}

	/**
	 * retorna TODA a lista de perfis
	 * @param  Request $request [string]
	 * @return [array]
	 */
	public function getAllQueryList($query) {
		  $allPerfils = Perfil::where('nome_completo', 'ilike', "%{$query}%")
		  ->paginate(18);

		  foreach ($allPerfils as &$perfil) {
		  	$perfil->photo = $perfil->getAvatarUrl();
		  }
		return view('perfil._listabuscaperfis', compact('query', 'allPerfils'));
	}

}
