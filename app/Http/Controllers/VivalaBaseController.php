<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CropPhotoRequest;
use Route;

use App\Ong;
use App\Perfil;
use App\Empresa;
use Input;
use Carbon\Carbon;
use App\PrettyUrl;
use App\Foto;


class VivalaBaseController extends Controller {

	//
	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	/**
	 * [updatePhoto description]
	 * @param  Integer Id do usuário
	 * @return ??
	 */	
	public function cropPhoto($id, CropPhotoRequest $request) {

		$currentRoute = Route::current();
		$entidade = null;
		$pathRetorno = null;



		/**
		 * Pegando tipo da entidade a partir da rota
		 */
		if (strstr($currentRoute->getUri(), 'Ong')) {
			$entidade = Ong::findOrFail($id);
			$pathRetorno = 'ong/'.$id.'/edit';
		} else if (strstr($currentRoute->getUri(), 'Empresa')) {
			$entidade = Empresa::findOrFail($id);
			$pathRetorno = 'empresa/'.$id.'/edit';
		} else if (strstr($currentRoute->getUri(), 'Perfil')) {
			$entidade = Perfil::findOrFail($id);
			$pathRetorno = 'editarPerfil';
		}

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
	      		if ($entidade->avatar) {	
		        	$currentAvatar = $entidade->avatar;
		        	$currentAvatar->tipo = null;
		        	$currentAvatar->save();
	      		}

	        	$foto = new Foto([
	        			'path' => $fileName,
	        			'tipo' => 'avatar' ]);
	        	$entidade->fotos()->save($foto);

	      		return redirect($pathRetorno);
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
