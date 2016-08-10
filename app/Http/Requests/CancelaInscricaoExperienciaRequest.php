<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class CancelaInscricaoExperienciaRequest extends Request
{

    private $experienciasRepository;

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
        $podeCancelar = $this->experienciasRepository->userPodeCancelarInscricao(Request::get('id_inscricao'), Auth::user());
        //checando se o usuario logado pode fazer essa request
        return Auth::user()->isAdmin() || $podeCancelar;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_inscricao' => 'required|exists:inscricao_experiencias,id',
        ];
    }

}
