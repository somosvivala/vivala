<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use App\Interfaces\ExperienciasRepositoryInterface;

class NovaInscricaoExperienciaRequest extends Request
{

    /**
     * Construtor recebendo instancia do repositorio de experiencias
     */
    function __construct(ExperienciasRepositoryInterface $repository)
    {
        $this->experienciasRepository = $repository;
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        //Apenas usuarios logados e nao atualmente inscritos
        $user  = Auth::user();
        $experiencia = $this->experienciasRepository->findOrFail(Request::get('id_experiencia'));

        if (!$user) {
            return false;
        }

        //Checando se ja existe uma inscricao ativa para esse usuario
        $existeInscricao = $this->experienciasRepository
                            ->getInscricaoUsuario($experiencia, Auth::user());

        //Se existir uma inscricao entao nao pode criar outra :)
        return $existeInscricao ? false : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_experiencia'       => "required|exists:experiencias,id",
            'data_inscricao'       => "required|date",
        ];
    }

}
