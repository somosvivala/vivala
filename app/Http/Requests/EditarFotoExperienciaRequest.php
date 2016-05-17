<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class EditarFotoExperienciaRequest extends Request
{

    //Como vamos lidar com experiencias, usamos do repositorio de experiencias
    public $experienciasRepository;

    //construtor recebendo instancia do repositorio
    function __construct(ExperienciasRepositoryInterface $repo) {
        $this->experienciasRepository = $repo;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //pegando o parametro passado nesse caso o ID da experiencia
        $id = $this->route('one');

        //retornando se o usuario pode fazer essa request
        return $this->experienciasRepository->checaUsuarioPodeEditar(Auth::user(), $id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

}
