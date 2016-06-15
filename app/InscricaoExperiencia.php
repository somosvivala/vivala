<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InscricaoExperiencia extends Model
{
    protected $fillable = [
        'experiencia_id',
        'perfil_id'
    ];


    /**
     * Denotando os campos dates para que o laravel sirva uma instancia do Carbon
     */
	  protected $dates = ['data_pagamento'];

    /**
     * Toda as inscricoes pertencem a uma experiencia especifica
     */
    public function experiencia()
    {
        return $this->belongsTo('App\Experiencia');
    }

    /**
     * Toda as inscricoes pertencem a um usuario especifico
     */
    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    /**
     * As inscricoes podem ter relacao com uma DataOcorrenciaExperiencia
     */
    public function dataExperiencia()
    {
        return $this->belongsTo('App\DataOcorrenciaExperiencia');
    }

    /**
     * Definindo uma scope para as inscricoes pendentes
     */
    public function scopePendentes($query)
    {
        return $query->where('status', 'pendente');
    }

    /**
     * Definindo uma scope para as inscricoes confirmadas
     */
    public function scopeConfirmadas($query)
    {
        return $query->where('status', 'confirmada');
    }

    /**
     * Definindo uma scope para as inscricoes canceladas
     */
    public function scopeCanceladas($query)
    {
        return $query->where('status', 'cancelada');
    }

    /**
     * Definindo uma scope para as inscricoes concluidas
     */
    public function scopeConcluidas($query)
    {
        return $query->where('status', 'concluida');
    }

    /**
     * Definindo uma scope para as inscricoes expiradas
     */
    public function scopeExpiradas($query)
    {
        return $query->where('status', 'expirada');
    }

}
