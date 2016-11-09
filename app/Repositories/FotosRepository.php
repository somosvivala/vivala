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
     * Metodo para formatar uma string removendo os espacos e adicionando um timestamp
     *
     * @param $fileName - string - nome original do arquivo
     *
     * @return string - filename formatado
     */
    public function formatStringWithCurrentTimestamp($filename)
    {
        //Removendo espaços dos nome do arquivo para evitar problemas com encoding de urls
        $filename = str_replace(' ', '', $filename);

        //gerando timestamp e concatenando com nome do arquivo modificado
        $novoFilename = Carbon::now()->getTimestamp() . '_' . $filename;

        //retornando novo filename
        return $novoFilename;
    }



}
