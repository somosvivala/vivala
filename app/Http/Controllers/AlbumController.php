<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Request;
use Input;
use App\Album;
use App\Foto;


class AlbumController extends VivalaBaseController {

	public function __construct(){
    //Só passa se estiver logado
    $this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Traz as informações do facebook salvas
		$user = Auth::user();
		// $facebookData = $user->facebookData;
		$perfil = $user->perfil;
		$ongs = $user->ongs;
		$empresas = $user->empresas;
		$albums = Album::all();
		
		return view('album.list', compact('albums','perfil','ongs','empresas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Traz as informações do facebook salvas
		$user = Auth::user();
		// $facebookData = $user->facebookData;
		$perfil = $user->perfil;
		$ongs = $user->ongs;
		$empresas = $user->empresas;

		return view('album.create', compact('perfil','ongs','empresas'));	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$novoAlbum = Auth::user()->entidadeAtiva->albums()->create(Request::all());
		return redirect('albums/'.$novoAlbum->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$album = Album::findOrFail($id);
		return view('album.show', compact('album'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$album = Album::findOrFail($id);
		return view('album.edit', compact('album'));
	}	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id)
	{
		$album = Album::findOrFail($id);
		$album->update(Request::all());
		$fotos_array = (array) Request::get('fotos');
		$fotos = Foto::whereIn('id', $fotos_array)->get();

		if ($fotos) 
		{
			foreach ($fotos as $key => $foto) {
				$album->fotos()->save($foto);
			}
		}

		 return redirect('albums/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



	/**
	 * Metodo para criar uma nova foto e associar ao album 
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function adicionarFoto($id) {

		$album = Album::findOrFail($id);

		//Adicionando nova foto ao album de $id
		$file = Input::file('foto_upload');

		dd($file);
	    if ($file) {

	        $destinationPath = public_path() . '/uploads/';
	        $filename = self::formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
	        $upload_success = $file->move($destinationPath, $filename);

	        if ($upload_success) 
	        {
	        	$foto = new Foto
	        	([
        			'path' => $destinationPath . $filename,
        			'tipo' => 'avatar' 
        		]);

	        	$album->fotos()->save($foto);
	        }
	    }
	}



}
