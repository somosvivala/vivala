<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscricaoExperiencia extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status',
        'data_pagamento',
        'perfil_id',
        'experiencia_id',
        'data_ocorrencia_experiencia',
        'data_cancelamento'
    ];


    /**
     * Denotando os campos dates para que o laravel sirva uma instancia do Carbon
     */
    protected $dates = [
        'data_pagamento',
        'data_ocorrencia_experiencia',
        'data_cancelamento',
        'deleted_at'
    ];


    /*
     * ### Relações entre as entidades ###
     */


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
     * As inscricoes podem ter um boleto
     */
    public function boleto()
    {
        return $this->hasOne('App\BoletoExperiencia');
    }



    /**
     * ### Acessors (modificacoes que executarão após recuperar o campo do BD) ###
     * ### (antes de devolver) ###
     */

    /**
     * Definindo um acessor para o dia em que ocorrera a experiencia
     */
    public function getDataExperienciaAttribute()
    {
        return $this->data_ocorrencia_experiencia;
    }

    /**
     * Definindo um acessor para saber se a inscricao teve pagamento confirmado
     */
    public function getTemPagamentoConfirmadoAttribute()
    {
        return $this->data_pagamento ? true : false;
    }

    /**
     * Definindo um acessor para para saber se a experiencia esta pendente
     */
    public function getIsPendenteAttribute()
    {
        return $this->status == 'pendente';
    }




    /**
     * ### Scopes -- 'queries' que serao executadas para filtrar as inscricoes de maneira legivel
     */

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

    /**
     * Definindo uma scope para as inscricoes ativas
     */
    public function scopeAtivas($query)
    {
        return $query->whereIn('status', ['pendente', 'confirmada']);
    }

    /**
     * Definindo uma scope para as inscricoes com pagamento confirmado
     */
    public function scopeComPagamentoConfirmado($query)
    {
        return $query->whereNotNull('data_pagamento');
    }


}
