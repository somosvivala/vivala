<?php namespace App\Services;

use App\User;
use App\Perfil;
use App\PrettyUrl;
use Carbon\Carbon;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
			'aniversario' => 'required|date'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{

		$user = User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);

	 	$perfil = new Perfil;
        $perfil->user_id = $user->id;
        $perfil->aniversario = Carbon::createFromFormat('d/m/Y', $data['aniversario']);
        $perfil->save();

        /**
         * Criando uma prettyUrl para o novo usuario (username_currentTimestamp)
         */
        $prettyUrl = new PrettyUrl();
        $prettyUrl->url = $user->username . '_' . Carbon::now()->getTimestamp();
        $prettyUrl->tipo = 'usuario';
        
        $perfil->prettyUrl()->save($prettyUrl);

		return $user;
	}

}
