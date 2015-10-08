<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Vaga extends Model {

	//mass assigned fields
	protected $fillable = [
		'habilidades',
		'sobre_trabalho',
                'horario_funcionamento'
		'responsavel_id',
                'logradouro',
                'cep', 	
		'bairro',
		'complemento',
                'cidade_id',
                'quantidade_vagas',
                'email_contato',
                'telefone_contato',
                'numero_beneficiados' 
		];	

	/**
	 * Estabelece a relaçao entre a entidade Vaga e a entidade Perfil,
	 * uma Vaga sempre tem um responsavel Perfil.
	 */
	public function responsavel() {
		return $this->belongsTo('App\Perfil');
	}

	/**
	 * Estabelece a relaçao entre a entidade Vaga e a entidade Perfil,
	 * uma Vaga tem muitos voluntarios do tipo Perfil, que podem
         * se voluntariar em varias Vagas
         */
	public function voluntarios() {
		return $this->belongsToMany('App\Perfil');
	}

	/**
	 * Relacao polimorfica de owner,
	 * @todo Por enquanto só Ong implementa essa relaçao.      
	 */
	public function owner() {
		return $this->morphTo();
	}

	/**
         * Acessor para o atributo numeroVoluntarios de Vaga
         * @return Integer    numero de voluntarios dessa Vaga */
	public function getNumeroVoluntariosAttribute() 
	{
	    return count($this->voluntarios);
	}


	public function podeEditarAttributte() 
	{
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		return $entidadeAtiva->tipo != 'ong' 
			? $entidadeAtiva->vagas->find($this->id) != null 
			: false;
        }


        
    /**
     * Estabelece a relaçao entre a entidade Vaga e a entidade Cidade,
     * uma Vaga pertence a uma Cidade
     */
    public function cidade() 
    {
        return $this->belongsTo('App\Cidade');        
    }


    /**
     * Acessor para o atributo Estado de Vaga
     * @return Estado   
     */
    public function getEstadoAttribute()
    {
        return ($this->cidade ? $this->cidade->estado : null);
    }


    /**
     * Uma vaga pertence a uma CategoriaVaga (é o jeito)
     * @return [type] [description]
     */
    public function categoria() 
    {
        return $this->belongsTo('App\CategoriaVaga', 'categoria_vaga_id');
    }


}
