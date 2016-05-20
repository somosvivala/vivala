<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class DeleteInformacaoExperienciaRequest extends Request
{

    //Como vamos lidar com experiencias, usamos do repositorio de experiencias
    public $experienciasRepository;

    /**
     * Construtor para receber as dependencias
     */
    function __construct(ExperienciasRepositoryInterface $repo)
    {
        $this->experienciasRepository = $repo;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //checando se o usuario logado pode fazer essa request
        return $this->experienciasRepository->checaUsuarioPodeCriar(Auth::user());
    }


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'info_id' => 'exists,informacao_experiencias,id'
		];
	}

}
