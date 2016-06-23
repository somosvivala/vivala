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
            'projeto'                   => "required|exists:ongs,id",
            'cidade'                    => "required|exists:cidades,id",
            'descricao_na_listagem' 		=> "string|required|min:2",
            'descricao'                 => "string|required|min:2",
            'detalhes'                  => "string|required|min:2",
            'preco'                     => "required|numeric",
            'informacao-extra'          => "array",
            'datas-ocorrencia'          => "array",
            'categoria'                 => "array",
            'experiencia-foto-id'       => "required|exists:fotos,id",
            'owner-experiencia-foto-id' => "required|exists:fotos,id",
            'owner_nome'                => "required|string|required",
            'owner_descricao'           => "required|string|required",
            'endereco_completo'         => "required|string|required"
        ];

        //iterando sob as informacoes que sao em forma de array
        //para settarmos regras de validacao para cada um dos childs
        $arrayInformacoesExtras = $this->request->get('informacao-extra');
        if ($arrayInformacoesExtras) {
            foreach($arrayInformacoesExtras as $key => $val)
            {
                $rules['informacao-extra.'.$key.'.id'] = 'exists:informacao_experiencias,id';
                $rules['informacao-extra.'.$key.'.icone'] = 'string';
                $rules['informacao-extra.'.$key.'.descricao_info'] = 'string';
            }
        }


        //iterando sob as informacoes que sao em forma de array
        //para settarmos regras de validacao para cada um dos childs
        $arrayDatas = $this->request->get('datas-ocorrencias');
        if ($arrayDatas) {
            //como nesse caso a $key é o id da InformacaoExperiencia,
            //precisamos iterar sob algum outro contador
            $i=0;
            foreach($arrayDatas as $key => $val)
            {
                $rules['datas-ocorrencias.'.$i] = 'exists:data_correncia_experiencias,id';
            }
        }

        //iterando sob as informacoes que sao em forma de array
        //para settarmos regras de validacao para cada um dos childs
        $arrayCategorias = $this->request->get('categoria');
        if ($arrayCategorias) {
            foreach($arrayCategorias as $key => $val)
            {
                $rules['categoria.'.$key] = 'exists:categoria_experiencias,id';
            }
        }

        return $rules;
    }

}
