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
			'password' => 'required|min:6|confirmed',
			'aniversario' => 'required'
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
		$nome = ucwords(strtolower($data['username']));
		$sobrenome = ucwords(strtolower($data['username_last']));
		
		//Criando perfil, usando dos atributos dentro de fillable[]
		$user = User::create([
			'username' => $nome,
			'email' => $data['email'],
			'genero' => $data['genero'],
			'password' => bcrypt($data['password'])
		]);


		//Criando perfil usando as informações da tela de registro.
	 	$perfil = new Perfil;
        $perfil->user_id = $user->id;
        $perfil->nome_completo = $nome .' '. $sobrenome;
		$perfil->apelido = $nome;
        $perfil->aniversario = Carbon::createFromFormat('d/m/Y', $data['aniversario']);
        $perfil->save();

        
        //Criando uma prettyUrl para o novo usuario (username_currentTimestamp)
        $prettyUrl = new PrettyUrl();
        $prettyUrl->url = str_replace(" ", "", $user->username) . '_' . Carbon::now()->getTimestamp();
        $prettyUrl->tipo = 'usuario';
        $perfil->prettyUrl()->save($prettyUrl);

		return $user;
	}

}
