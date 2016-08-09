<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletoExperiencia extends Model
{

    //campos permitidos mass-assignment (create / update)
    protected $fillable = [
        'data_emissao',
        'data_vencimento',
        'valor',
        'instrucao',
        'status',
        'token',
    ];

    //campos que sao datas, assim recebemos uma instancia do Carbon
    protected $dates = [
        'data_emissao',
        'data_vencimento'
    ];

    /*
     * ### Relações entre as entidades ###
     */

    /**
     * Um Boleto sempre pertence a uma InscricaoExperiencia
     */
    public function inscricao()
    {
        return $this->belongsTo('App\InscricaoExperiencia', 'inscricao_experiencia_id');
    }

    /**
     * Um Boleto sempre pertence a um usuário que é o pagador
     */
    public function pagador()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    /**
     * ### Mutators (modificacoes que executarao antes de inserir no BD) ###
     */

    /**
     * Definindo um mutator para o campo boleto_instrucoes (inserindo array serializado)
     */
    public function setInstrucaoAttribute($value)
    {
        $this->attributes['instrucao'] = serialize($value);
    }


    /**
     * ### Acessors (modificacoes que executarão após recuperar o campo do BD) ###
     * ### (antes de devolver) ###
     */

    /**
     * Definindo um acessor para campo boleto_instrucoes (des-serializando a string array)
     */
    public function getInstrucaoAttribute($value)
    {
        return unserialize($value);
    }

    /**
     * Definindo um acessor para o campo data_emissao
     */
    public function getDataEmissaoFormatadaAttribute()
    {
        return $this->data_emissao->format('Y-m-d');
    }

    /**
     * Definindo um acessor para o campo data_vencimento
     */
    public function getDataVencimentoFormatadaAttribute()
    {
        return $this->data_vencimento->format('Y-m-d');
    }


}
