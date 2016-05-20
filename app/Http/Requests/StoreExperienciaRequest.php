<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class StoreExperienciaRequest extends Request
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
        $rules = [
            'frase_listagem' 		=> "string|required|min:2",
            'descricao' 			  => "string|required|min:2",
            'detalhes' 			    => "string|required|min:2",
            'preco'             => "required|numeric",
            'cidade'            => "required|exists:cidades,id",
            'projeto'           => "required|exists:ongs,id",
            'categoria'         => "array",
            'icone'             => "array",
            'descricao_info'    => "array"
        ];

        //iterando sob os arrays de icones e descricoes deles, para settar as regras
        //de validacao para cada um desses inputs
        $i=0;
        foreach($this->request->get('icone') as $key => $val)
        {
            $rules['icone.'.$i] = 'exists:informacao_experiencias,id';
            $rules['descricao_info.'.$i] = 'string';
            $i++;
        }

        foreach($this->request->get('categoria') as $key => $val)
        {
            $rules['categoria.'.$key] = 'exists:categoria_experiencias,id';
        }

        return $rules;
    }

}
