<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\Post;
use App\Foto;
use App\Http\Requests\CropPhotoRequest;



use Auth;
use Input;
use Request;
class FotoController extends VivalaBaseController {

	/**
	 * construtor seguro.
	 */
	public function __construct(){
	    //Só passa se estiver logado
	    $this->middleware('auth');
	}

	public function postCropandsave($id=0, CropPhotoRequest $request) {
		$file = Input::file('image_file_upload');
	    if ($file && $file->isValid()) {

			$entidade = Auth::user()->entidadeAtiva;
			$destinationPath = public_path() . '/uploads/';
			$extension = Input::file('image_file_upload')->getClientOriginalExtension(); // Pega o formato da imagem

			$widthCrop = round($request->input('w'));
			$heightCrop = round($request->input('h'));
			$xSuperior = round($request->input('x'));
			$ySuperior = round($request->input('y'));

                        //Se tem owner, caso nao esteja pre criano uma foto para uma entidade
                        $naoTemOwner = $request->input('NoOwner');

                        // pega o tipo da foto (avatar, capa, etc)
                        $tipo = $request->input('tipo');
                        if(!$tipo) {
                            $tipo = 'avatar';
                        }
                        $fileName = $this->formatFileNameWithUserAndTimestamps($file->getClientOriginalName()).'.'.$extension;
			$file = \Image::make( $file->getRealPath() )->crop($widthCrop, $heightCrop, $xSuperior, $ySuperior);
			$upload_success = $file->save($destinationPath.$fileName);
	        if ($upload_success) {

                        //Se nao tiver owner, entao estou pre settando a foto de 
                        //avatar antes de criar a entidade.
                        if ($naoTemOwner) {
                            $foto = Foto::create(['path' => $fileName, 'tipo' => $tipo]);
                        
                        //Se tiver um owner, entao ja salvar a foto para a 
                        //entidade ativa
                        } else {
                            $foto = new Foto(['path' => $fileName, 'tipo' => $tipo]);        	
                            
                            /* Settando tipo da foto atual para null, checando se existe antes */
                            if ($tipo == 'avatar' && $entidade->avatar) {
                                    $currentAvatar = $entidade->avatar;
                                    $currentAvatar->tipo = null;
                                    $currentAvatar->save();
                            }

                            $entidade->fotos()->save($foto);
                        }

	      		return $foto;
	        } else {
	        	return false;
	        }
	    }

	}


	/**
	 * Metodo para salvar uma foto
	 */
	public function postUploadphoto() {

		$file = Input::file('foto');

	    if ($file && $file->isValid()) {

			$destinationPath = public_path() . '/uploads/';
			$extension = $file->getClientOriginalExtension(); // Pega o formato da imagem
			$fileName = $this->formatFileNameWithUserAndTimestamps($file->getClientOriginalName());
			$upload_success = $file->move($destinationPath,$fileName);

			// Testa se o arquivo foi uploaded
			if ($upload_success) {

				// Cria um objeto de foto
				$foto = new Foto(['path' => $fileName]);

				//Associa a foto ao Perfil
				// Auth::user()->perfil->fotos()->save($foto);

				// Associa a foto à entidade

				$entidade = Auth::user()->entidadeAtiva;
				if ($entidade) {
	                	    $entidade->fotos()->save($foto);
            	        	} else {
                                    $entidade->push();
	        	}


	      		return $foto;

	        } else {
	        	return false;
	        }
		}
	}


}
