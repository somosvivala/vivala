<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class EditarFotoExperienciaRequest extends Request {

    public $experienciasRepository;

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
      $experiencia = $this->experienciasRepository->findOrFail($id);

      //retornando se o usuario pode fazer essa request
      return $experiencia->usuarioPodeEditar(Auth::user());
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
