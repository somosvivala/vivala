<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\InformacaoExperiencia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experiencia extends Model
{

    use SoftDeletes;

    //mass assigned fields
    protected $fillable = [
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
     * Uma Experiencia tem uma foto.
     */
    public function fotoCapa()
    {
        return $this->morphOne('App\Foto', 'owner', 'owner_type', 'owner_id');
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


}
