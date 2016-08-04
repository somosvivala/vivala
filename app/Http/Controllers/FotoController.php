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
use App\Interfaces\FotosRepositoryInterface;

class FotoController extends VivalaBaseController {

    private $experienciasRepository;
    private $fotosRepository;

    /**
     * construtor seguro.
     * @param $repository - Instancia do Repositorio que extend essa interface
     */
    public function __construct(ExperienciasRepositoryInterface $repository, FotosRepositoryInterface $fotoRepository){
        //Só passa se estiver logado
        $this->middleware('auth');
        $this->experienciasRepository = $repository;
        $this->fotosRepository = $fotoRepository;
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
     *
     * @param $request - Uma instancia de CropPhotoRequest, servida pelo laravel
     * @param $experienciaId - o id da experiencia que iremos associar a foto
     *
     * @return App\Foto - instancia da foto criada
     */
    public function postCropandsaveexperiencia(CropPhotoRequest $request, $experienciaId=false)
    {
        //criando nova foto
        $result =  $this->fotosRepository->novaFoto($request);

        //Se existe experiencia entao estou editando e devo associar a nova foto a experiencia
        if ($experienciaId) {
            $foto = $result['foto'];
            $experiencia = $this->experienciasRepository->findOrFail($experienciaId);
            $this->experienciasRepository->atualizaFotoCapa($experiencia, $foto);
        }

        //Se experiencia nao existe, entao só preciso devolver a nova foto
        return $result;
    }


    /**
     * Metodo para receber por POST uma CropPhotoRequest,
     * croppar e devolver o id da foto para ser associada ao owner
     *
     * @param $request - Uma instancia de CropPhotoRequest, servida pelo laravel
     * @param $experienciaId - o id da experiencia que iremos associar a foto
     *
     * @return App\Foto - instancia da foto criada
     */
    public function postCropandsaveownerexperiencia(CropPhotoRequest $request, $experienciaId=false)
    {
        //criando nova foto
        $result =  $this->fotosRepository->novaFoto($request);

        //Se existe experiencia entao estou editando e devo associar a nova foto ao owner da experiencia
        if ($experienciaId) {
            $foto = $result['foto'];
            $experiencia = $this->experienciasRepository->findOrFail($experienciaId);
            $this->experienciasRepository->atualizaFotoOwner($experiencia, $foto);
        }

        //Se experiencia nao existe, entao só preciso devolver a nova foto
        return $result;
    }




}
