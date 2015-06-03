<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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
	protected $fillable = ['username', 'email', 'password', 'avatar' ];

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
	 * Um usuario pode ter muitas ONGS
	 * 
	 */
    public function ongs()
    {
		return $this->hasMany('App\Ong');
    }

    /**
	 * Um usuario pode ter muitas Empresas
	 * 
	 */
    public function empresas()
    {
		return $this->hasMany('App\Empresa');
    }



    public function getAvatarAttribute($value)
    {
    	$urlBase = "../../../uploads/";
    	
    	//Testa se o valor é uma URL
    	if( preg_match ( '/^https?:\/\//' , $value) ) {
    		return $value;
    	} else {
    		return $urlBase.$value;
    	}
    }

}
