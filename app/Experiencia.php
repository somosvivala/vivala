<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\InformacaoExperiencia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Auth;

class Experiencia extends Model
{

    use SoftDeletes;

    //mass assigned fields
    protected $fillable = [
        'owner_nome',
        'owner_descricao',
        'endereco_completo',
        'descricao_na_listagem',
        'descricao',
        'detalhes',
        'preco',
        'tipo',
        'tipo_servico_dias',
        'frequencia',
        'status'
    ];


    /**
     * ### RELACOES
     */

    /**
     * Uma Experiencia pode ser feito por ongs ou empresas
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**
     * Uma Experiencia tem sempre um local
     * @obs usando relacoes polimorficas possibilitando outros locais alem de cidades
     */
    public function local()
    {
        return $this->morphTo();
    }

    /**
     * Uma Experiencia tem 2 fotos (uma para sua capa e outra para quem a promove)
     */
    public function fotos()
    {
        return $this->morphMany('App\Foto', 'owner', 'owner_type', 'owner_id');
    }

    /**
     * Uma Experiencia tem muitas inscriçoes
     */
    public function inscricoes()
    {
        return $this->hasMany('App\InscricaoExperiencia');
    }

    /**
     * Uma Experiencia tem muitas informacoes
     */
    public function informacoes()
    {
        return $this->hasMany('App\InformacaoExperiencia');
    }

    /**
     * Uma Experiencia pertence a muitas CategoriaExperiencia
     */
    public function categorias()
    {
        return $this->belongsToMany('App\CategoriaExperiencia');
    }

    /**
     * Uma Experiencia tem muitas inscriçoes
     */
    public function ocorrencias()
    {
        return $this->hasMany('App\DataOcorrenciaExperiencia');
    }


    /**
     * ### ACESSORS & MUTATORS
     */

    /**
     * Definindo um acessor para o campo tipo_servico_datas
     * Esse campo guarda um array com os dias em que o servico é oferecido
     */
    public function getDiasOperacionaisDaSemanaAttribute()
    {
        return unserialize($this->tipo_servico_dias);
    }

    /**
     * Definindo um mutator para o campo tipo_servico_dias
     * Esse campo guarda um array com os dias em que o servico é oferecido
     */
    public function setTipoServicoDiasAttribute($value)
    {
        $this->attributes['tipo_servico_dias'] = serialize($value);
    }

    /**
     * Definindo um acessor para os dias operacionais da semana em formato JSON
     * para ser usado por experiencias do tipo evento_servico
     */
    public function getDiasOperacionaisJSONAttribute()
    {
        $arrayDatas=[];
        $arrayDias = $this->diasOperacionaisDaSemana ?  $this->diasOperacionaisDaSemana : [];

        //Caso a experiencia nao tenha diasOperacionais entao retornar array vazio
        if (!$arrayDias) {
            return [];
        }

        //iterando sob os dias da semana para pegar as datas correspondentes
        foreach ($arrayDias as $diaSemana) {
            switch ($diaSemana) {
                case 'Domingo' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this sunday');
                    break;
                case 'Segunda' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this monday');
                    break;
                case 'Terca' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this tuesday');
                    break;
                case 'Quarta' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this wednesday');
                    break;
                case 'Quinta' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this thursday');
                    break;
                case 'Sexta' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this friday');
                    break;
                case 'Sabado' :
                    $arrayDatas[] = \Carbon\Carbon::parse('this saturday');
                    break;
            }
        }

        //iterando sob os dias de funcionamento e criando datas para as proximas 10 semanas
        $arrayAux = $arrayDatas;
        foreach ($arrayAux as $dataOperacional) {
            for ($i = 1; $i <= 3; $i++) {
                $arrayDatas[] = $dataOperacional->copy()->addDays(7*$i);
            }
        }

        //formatando da maneira que o calendario compreende
        foreach ($arrayDatas as $key => $data) {
            $jsonObj[$key] = new \stdClass();
            $jsonObj[$key]->date = $data->format('Y-m-d');
        }

        return  json_encode($jsonObj);

    }

    /**
     * Definindo um acessor para as proximas Ocorrencias de uma Experiencia em JSON
     * para ser usado por experiencias do tipo evento_recorrente
     */
    public function getProximasOcorrenciasJSONAttribute()
    {
        $obj=[];
        //iterando sobre as ocorrencias futuras e formatando elas no formato do calendario
        $this->futurasOcorrencias->each(function ($dataOcorrencia) use (&$obj) {
            $std = new \stdClass();
            $std->date = $dataOcorrencia->data_ocorrencia->format('Y-m-d');
            $obj[] = $std;
        });

        return json_encode($obj);
    }

    /**
     * Definindo um acessor para a foto de capa da experiencia
     */
    public function getFotoCapaAttribute()
    {
        return $this->fotos()->where('foto_owner_experiencia', false)->first();
    }

    /**
     * Definindo um acessor para a foto do owner da experiencia
     */
    public function getFotoOwnerAttribute()
    {
        return $this->fotos()->where('foto_owner_experiencia', true)->first();
    }

    /**
     * Acessor para a próxima ocorrencia a partir de hoje
     *
     * @return \Carbon\Carbon
     */
    public function getProximaOcorrenciaAttribute()
    {
        $existeOcorrencias = !$this->ocorrencias->isEmpty();

        return $existeOcorrencias ?
            $this->ocorrencias()
            ->where('data_ocorrencia', '>=', Carbon::now())
            ->orderBy('data_ocorrencia', 'asc')
            ->first()
            : null;
    }

    /**
     * Acessor para a próxima ocorrencia a partir de hoje
     *
     * @return \Carbon\Carbon
     */
    public function getFuturasOcorrenciasAttribute()
    {
        $existeOcorrencias = !$this->ocorrencias->isEmpty();

        return $existeOcorrencias ?
            $this->ocorrencias()
            ->where('data_ocorrencia', '>=', Carbon::now())
            ->orderBy('data_ocorrencia', 'asc')
            ->get()
            : null;
    }



    /**
     * Acessor para a próxima ocorrencia a partir de hoje
     *
     * @return String - "dd/mm"
     */
    public function getDataProximaOcorrenciaAttribute()
    {
        $existeOcorrencias = $this->ocorrencias;
        if($existeOcorrencias) {
        $ProximaOcorrencia = $this->ocorrencias()->where('data_ocorrencia', '>=', Carbon::now()) ->orderBy('data_ocorrencia', 'asc')->first();
        }

        return $ProximaOcorrencia ? $ProximaOcorrencia->data_ocorrencia->format('d/m') : '';
    }

    /*
     * Acessor para retornar a url da fotoCapa
     */
    public function getFotoCapaUrlAttribute()
    {
        if ($this->fotoCapa) {
            return $this->fotoCapa->path;
        }

        return '/img/dummy-exp.jpg';
    }

    /*
     * Acessor para retornar a url da foto do owner da experiencia
     */
    public function getFotoOwnerUrlAttribute()
    {
        if ($this->fotoOwner) {
            return $this->fotoOwner->path;
        }

        return '/img/dummy-exp.jpg';
    }

    /**
     * Definindo um acessor para as inscricoesAtivas (pendentes + confirmadas)
     */
    public function getInscricoesAtivasAttribute()
    {
        return $this->inscricoes()
            ->whereIn('status', ['pendente', 'confirmada'])
            ->get();
    }

    /**
     * Definindo um acessor para saber se a experiencia está eminente (tem uma proxima data daqui 3 dias)
     * @return boolean - se vai acontecer em 3 dias ou nao
     */
    public function getAconteceEmTresDiasAttribute()
    {
        $proximaOcorrencia = $this->proximaOcorrencia;
        if (!$proximaOcorrencia) {
            return false;
        }

        //Calculando a diferenca de dias entre a proximaOcorrencia da experiencia e 3 dias a partir de hoje
        $diferencaDias = $proximaOcorrencia->data_ocorrencia->diffInDays(Carbon::now()->addDays(3));
        return ($diferencaDias == 0);
    }

    /**
     * Definindo um acessor para determinar se a experiencia esta acontecendo hoje
     */
    public function getAconteceHojeAttribute()
    {
        return $this->proximaOcorrencia ? $this->proximaOcorrencia->isToday : false;
    }

    /**
     * Definindo um acessor para saber se a experiencia esta ativa
     */
    public function getIsAtivaAttribute()
    {
        return $this->status == 'publicada';
    }

    /**
     * Definindo um acessor para testar se tipo == evento_unico
     */
    public function getisEventoUnicoAttribute()
    {
        return $this->tipo == 'evento_unico';
    }

    /**
     * Definindo um acessor para testar se tipo == evento_recorrente
     */
    public function getisEventoRecorrenteAttribute()
    {
        return $this->tipo == 'evento_recorrente';
    }

    /**
     * Definindo um acessor para testar se tipo == evento_servico
     */
    public function getisEventoServicoAttribute()
    {
        return $this->tipo == 'evento_servico';
    }

    /**
     * Definindo um acessor para saber se um User está inscrito
     */
    public function getIsUsuarioAtualInscritoAttribute()
    {
        //Se nao tiver logado, false
        if (!Auth::user())
            return false;

        //Se tiver logado pegar collection com query buscando o mesmo perfil
        //e testar se collection tem alguma inscricao
        return !($this->inscricoes()
            ->ativas()
            ->where('perfil_id', Auth::user()->perfil->id)
            ->get()
            ->isEmpty());
    }


    /**
     * ### SCOPES
     */


    /**
      * Definindo uma scope para as Experiencias em 'analise'
     */
    public function scopeAnalise($query)
    {
        return $query->where('status', 'analise');
    }

    /**
      * Definindo uma scope para as Experiencias publicadas
     */
    public function scopePublicadas($query)
    {
        return $query->where('status', 'publicada');
    }

    /**
      * Definindo uma scope para as Experiencias realizadas (finalizadas? / nao vao mais acontecer)
     */
    public function scopeRealizadas($query)
    {
        return $query->where('status', 'realizada');
    }

    /**
      * Definindo uma scope para as Experiencias com data
     */
    public function scopeComDataMarcada($query)
    {
        return $query->has('ocorrencias');
    }


    /*
     * ### METODOS
     */

    /**
     * Metodo para pegar a inscricao de um Usuario
     */
    public function getInscricaoUsuario(User $user)
    {
        return $this->inscricoes()->ativas()->where('perfil_id', $user->perfil->id)->first();
    }



}
