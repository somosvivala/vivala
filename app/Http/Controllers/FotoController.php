<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\Post;
use App\Foto;
use App\Http\Requests\CropPhotoRequest;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;
use Input;
use Request;

class FotoController extends VivalaBaseController {

    /**
     * construtor seguro.
     * @param $repository - Instancia do Repositorio que extend essa interface
     */
    public function __construct(ExperienciasRepositoryInterface $repository){
        //Só passa se estiver logado
        $this->middleware('auth');
        $this->ExperienciasRepository = $repository;
    }

    public function postCropandsave($id=0, CropPhotoRequest $request) {
        $file = Input::file('file');
        if ($file && $file->isValid()) {

            $entidade = Auth::user()->entidadeAtiva;
            $destinationPath = public_path() . '/uploads/';
            $extension = Input::file('file')->getClientOriginalExtension(); // Pega o formato da imagem

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
                        $avatares = $entidade->fotos()->where('tipo','avatar')->get();
                        foreach ($avatares as $currentAvatar) 
                        {
                            $currentAvatar->tipo = null;
                            $currentAvatar->save();
                        }
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


    /**
     * Metodo para receber por POST uma CropPhotoRequest,
     * croppar e settar a foto para a Experiencia em questao
     */
    public function postCropandsaveexperiencias(CropPhotoRequest $request, $experienciaId)
    {
        $file = Input::file('file');
        if ($file && $file->isValid()) {

            $experiencia = $this->ExperienciasRepository->findOrFail($experienciaId);
            $destinationPath = public_path() . '/uploads/';
            $extension = Input::file('file')->getClientOriginalExtension(); // Pega o formato da imagem

            $widthCrop = round($request->input('w'));
            $heightCrop = round($request->input('h'));
            $xSuperior = round($request->input('x'));
            $ySuperior = round($request->input('y'));

            $fileName = $this->formatFileNameWithUserAndTimestamps($file->getClientOriginalName()).'.'.$extension;
            $file = \Image::make( $file->getRealPath() )->crop($widthCrop, $heightCrop, $xSuperior, $ySuperior);
            $upload_success = $file->save($destinationPath.$fileName);

            //Se o upload da foto ocorreu com sucesso
            if ($upload_success) {

                //criar nova foto e associar a experiencia
                $entidade->fotos()->save(Foto::create(['path' => $fileName]));
                return $foto;

            } else {
                return false;
            }
        }
    }



}
