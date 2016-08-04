<?php namespace App\Repositories;

use App\Foto;
use App\Http\Requests\CropPhotoRequest;
use App\Interfaces\FotosRepositoryInterface;
use Input;
use Carbon\Carbon;

/**
 * Classe para centralizar metodos referentes as Fotos
 */
class FotosRepository extends FotosRepositoryInterface
{

    /**
     * Metodo para criar uma nova foto e retornar o id
     */
    public function novaFoto(CropPhotoRequest $request)
    {
        //testando se o file é valido
        $file = Input::file('file');
        if ($file && $file->isValid()) {

            //criando path inicial para direcionar o arquivo
            $destinationPath = public_path() . '/uploads/';
            $extension = Input::file('file')->getClientOriginalExtension(); // Pega o formato da imagem

            //pegando dimensoes para fazer o crop
            $widthCrop = round($request->input('w'));
            $heightCrop = round($request->input('h'));
            $xSuperior = round($request->input('x'));
            $ySuperior = round($request->input('y'));

            //formatando filename e usando o a Image Facade para criar uma nova imagem
            $fileName = $this->formatStringWithCurrentTimestamp($file->getClientOriginalName()).'.'.$extension;
            $file = \Image::make( $file->getRealPath() )->crop($widthCrop, $heightCrop, $xSuperior, $ySuperior);
            $upload_success = $file->save($destinationPath.$fileName);

            //Se o upload da foto ocorreu com sucesso
            if ($upload_success) {

                // Cria uma novo foto e retorna um array avisano o sucesso e o id da foto recem criada
                $foto = Foto::create(['path' => $fileName]);
                return [
                    'success' => true,
                    'foto' => $foto
                ];

            // Se nao tiver funcionado, retornar false no success para o js se manisfestar
            } else {
                return [
                    'success' => false
                ];
            }
        }
    }



    /**
     * Metodo para formatar o nome da foto com o timestamp atual
     */
    public function formatStringWithCurrentTimestamp($filename)
    {
        $timestamp = Carbon::now()->getTimestamp() . '_';
        return $timestamp.trim($filename);
    }



}
