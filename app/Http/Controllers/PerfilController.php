<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarPerfilRequest;
use App\User;
use Auth;
use Session;
use App;

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
		$user->string_prettyUrl = $request->input('string_prettyUrl');

		//Salva dados referentes ao User
		$perfil = $user->perfil;
		$perfil->stri_aniversario = $request->input('stri_aniversario');
		$perfil->stri_cidade_natal = $request->input('stri_cidade_natal');
		$perfil->save();

		return redirect('home');
	}

	public function showUserProfile($user = null) {
		
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


}