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

}
