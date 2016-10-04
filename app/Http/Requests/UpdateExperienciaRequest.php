<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Interfaces\ExperienciasRepositoryInterface;
use Auth;

class UpdateExperienciaRequest extends Request
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
            'nome'                      => "required|string|min:2|max:50",
            'preco'                     => "required|numeric",
            'icone'                     => "array",
            'descricao_info'            => "array",
            'datas-ocorrencia'          => "array",
            'categoria'                 => "array",
            'experiencia-foto-id'       => "exists:fotos,id",
            'owner-experiencia-foto-id' => "exists:fotos,id",
            'owner_nome'                => "required|string",
            'owner_descricao'           => "required|string",
            'frequencia'                => "required|string",
            'tipo'                      => "required|string",
            'tipo_servico_dias'         => "array",
            'endereco_completo'         => "required|string"

        ];


        //iterando sob as informacoes que sao em forma de array
        //para settarmos regras de validacao para cada um dos childs
        $arrayInformacoesExtras = $this->request->get('icone');
        if ($arrayInformacoesExtras) {
            //como nesse caso a $key é o id da InformacaoExperiencia,
            //precisamos iterar sob algum outro contador
            $i=0;
            foreach($arrayInformacoesExtras as $key => $val)
            {
                $rules['icone.'.$i] = 'exists:informacao_experiencias,id';
                $rules['descricao_info.'.$i] = 'string';
                $i++;
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
