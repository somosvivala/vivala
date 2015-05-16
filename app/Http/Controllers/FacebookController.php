<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory as Socialite; 
use App\User;

class FacebookController extends Controller {

	public function __construct(Socialite $socialite, Auth $auth)
	{
		$this->socialite = $socialite;
		$this->auth = $auth;
	}

	public function fbLogin(Request $request)
	{
		if(!$request->has('code')) //testa se o request veio com um codigo de retorno do fb
		{
			//não tem código, redireciona pra autorização do fb
			return $this->socialite->driver('facebook')->redirect();
		}

		//procura se tem algum email cadastrado nesse perfil, se nao tiver cadastra um novo
		$user = $this->findByEmailOrCreate($this->getFacebookUser());

		//$this->auth->login($user);
		Auth::login($user);
	}

	private function getFacebookUser()
	{
		return $this->socialite->driver('facebook')->user();
	}

	private function findByEmailOrCreate($userData)
	{
		return User::firstOrCreate([
			'email' => $userData->email,
			'username' => $userData->name,
			'avatar' => $userData->avatar
		]);
	}

}
