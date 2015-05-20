<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditarPerfilRequest;
use App\User;
use Auth;

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
		return view('perfil.index', compact('user'));
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
		return view('perfil.edit', compact('user'));
	}

	/**
	 * Update the User in the database
	 * @param  Integer                $id  		id do usuario   
	 * @param  EditarPerfilRequest    $request  Request do form
	 * @return 									Redireciona para home                          
	 */
	public function update($id, EditarPerfilRequest $request)	
	{
		$user = User::findOrFail($id);
		$user->update($request->all());
		return redirect('home');
	}

}
