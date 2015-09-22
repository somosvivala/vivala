<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Collection;

use Session;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'genero'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];



	public function facebookData()
	{
		return $this->hasOne('App\FacebookData');
	}

	/**
	 * Um usuario tem um perfil
	 */
	public function perfil()
	{
		return $this->hasOne('App\Perfil');
	}

    /**
	 * Um usuario pode ter várias ONGS
	 * 
	 */
    public function ongs()
    {
		return $this->hasMany('App\Ong');
    }

    /**
	 * Um usuario pode ter várias Empresas
	 * 
	 */
    public function empresas()
    {
		return $this->hasMany('App\Empresa');
    }


    /**
     * Acessor para a propriedade entidadeAtiva
     * @return   Instancia de Perfil|Ong|Empresa
     */
    public function getEntidadeAtivaAttribute() {

    	if (Session::has('entidadeAtiva_tipo')) {

    		$entidadeAtiva_id = Session::get('entidadeAtiva_id', null);
    		$entidadeAtiva_tipo = Session::get('entidadeAtiva_tipo', 'perfil');
    		
			switch ($entidadeAtiva_tipo)  {
				case 'ong':
					# Retorna a ong na lista de ongs do usuario, ou o perfil 
	    			$ong = $this->ongs->find($entidadeAtiva_id);
	    			return $ong ? $ong : $this->perfil;
					break;
				
				case 'empresa':
					# Retorna a empresa na lista de empresas do usuario, ou o perfil
					$empresa = $this->empresas->find($entidadeAtiva_id);
    				return $empresa ? $empresa : $this->perfil;
					break;
				
				default:
					# Retorna o perfil do usuario
					return  $this->perfil;
					break;
			}
    	}

    	Session::put('entidadeAtiva_id', $this->perfil->id);
    	Session::put('entidadeAtiva_tipo', 'perfil');
		return  $this->perfil;
    }


    /**
     * Acessor para as paginas desse usuario.
     * @return Collection <Ong|Empresa> , todas as ongs e empresas desse usuario
     */
    public function getPaginasAttribute() 
    {
    	$ongs = $this->ongs;
    	$empresas = $this->empresas;
		$paginas = new Collection();

    	if (count($ongs)) 
    	{
	    	foreach ($ongs as $key => $ong) {
	    		$paginas->add($ong);
	    	}
		}

		if (count($empresas)) 
		{
			foreach ($empresas as $key => $empresa) {
				$paginas->add($empresa);
			}
		}

    	return $paginas;
    }
}
