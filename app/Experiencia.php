<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Experiencia extends Model
{

    //mass assigned fields
    protected $fillable = [
        'titulo',
        'descricao',
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
     * Uma Experiencia pertence a muitas CategoriaExperiencia 
     */
    public function categorias()
    {
        return $this->belongsToMany('App\CategoriaExperiencia');
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

    /**
     * Metodo para determinar se o usuario atualmente logado
     * tem permissao para editar essa experiencia
     *
     * @param $user - Uma instancia do usuario que queremos testar
     * a permissao
     */
    public function usuarioPodeEditar(User $user)
    {
        //Se a entidadeAtiva for a ong criadora da experiencia
        $podeEditar = ($this->owner == $user->entidadeAtiva);

        //ou se o usuario ativo for um admin
        $podeEditar = $podeEditar || $user->isAdmin();

        return $podeEditar;
    }



}
