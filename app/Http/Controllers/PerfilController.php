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
		$perfil->stri_aniversario = $request->input('stri_aniversario');
		$perfil->stri_cidade_natal = $request->input('stri_cidade_natal');
		$perfil->prettyUrl()->update([
			'stri_url_prettyUrls' => $request->input('string_prettyUrl'),
			'enum_tipo_prettyUrls' => 'usuario'
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
	 * [showUserProfile description]
	 * @param  [type] $user [description]
	 * @return [type]       [description]
	 */
	public function showUserProfile($user = null) 
	{
		
		if (!$user) {
			if (Session::has('user')) {
				$user = Session::get('user');
			} else {
				App::abort(404);
			}
		} 

		$perfil = $user->perfil;
		$follow = $perfil->follow;
		$followedBy = $perfil->followedBy;
		return view('perfil.index', compact('user', 'perfil', 'follow', 'followedBy'));
	}


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
