<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DataOcorrenciaExperiencia extends Model
{

    protected $fillable = [
        'data_ocorrencia',
        'experiencia_id'
    ];

    /* Denotando os campos dates para que o laravel sirva uma instancia do Carbon */
	  protected $dates = ['data_ocorrencia'];

    /**
     * Uma DataOcorrenciaExperiencia pertence a uma Experiencia
     */
    public function experiencia()
    {
        return $this->belongsTo('App\Experiencia');
    }

    /**
     * Uma data pode conter varias inscricoes confirmadas
     */
    public function inscricoesConfirmadas()
    {
        return $this->hasMany('App\InscricaoExperiencia');
    }


    /**
     * Acessor para retornar datas em um formato especifico
     */
    public function getDataAttribute()
    {
        return $this->data_ocorrencia ? $this->data_ocorrencia->format('d/m/Y') : '';
    }

    /**
     * Definindo um acessor para saber se a data é hoje
     */
    public function getIsTodayAttribute()
    {
        return $this->data_ocorrencia ? $this->data_ocorrencia->isToday() :  false;
    }



}
