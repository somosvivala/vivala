<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoletoExperiencia extends Model
{
    use SoftDeletes;

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
        'data_vencimento',
        'deleted_at'
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

    /**
     * Definindo um acessor para o link da 2 via do boleto
     */
    public function getLinkSegundaViaAttribute()
    {
        //sufixo para pegar a variavel correta dependendo do ambiente
        $sufixo = (env('APP_ENV') == 'development' ? '_DEV' : '');
        return env('BOLETOCLOUD_URL_BASE'.$sufixo) . '/boleto/2via/download/' . $this->token;
    }


    /**
     * Definindo um acessor para saber se o boleto é valido
     */
    public function getIsValidoAttribute()
    {
        return $this->status == 'gerado';
    }



}
