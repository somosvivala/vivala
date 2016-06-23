<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\InformacaoExperiencia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
        'status'
    ];


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




}
