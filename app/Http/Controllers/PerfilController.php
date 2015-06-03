<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarPerfilRequest;
use App\User;
use Auth;
use Session;
use App;
use Input;
use Carbon\Carbon;

class PerfilController extends Controller {


	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
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
		$follow = $perfil->follow;
		$followedBy = $perfil->followedBy;

		return view('perfil.index', compact('user', 'perfil', 'follow', 'followedBy'));
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
		$perfil->aniversario = $request->input('aniversario');
		$perfil->cidade_natal = $request->input('cidade_natal');
		$perfil->prettyUrl()->update([
			'url' => $request->input('url'),
			'tipo' => 'usuario'
		]);
		
		//Salvando imagem no avatar do usuario;
		$file = Input::file('image');
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) {
	        	$perfil->user()->update(['avatar' => $destinationPath . $filename]);
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

		if (Session::has('perfil')) {
			$perfil = Session::get('perfil');
		} else {
			$prettyUrl = App\PrettyUrl::all()->where('url', $prettyUrl)->first();

			if (!is_null($prettyUrl)) {
				$perfil = App\Perfil::find($prettyUrl->prettyurlable_id);
			} else {
				App::abort(404);
			}
		}
		
		$user = $perfil->user;
		$follow = $perfil->follow;
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
