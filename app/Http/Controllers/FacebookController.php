<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory as Socialite; 
use Auth;
use App\User;

class FacebookController extends Controller {

	public function __construct(Socialite $socialite)
	{
		$this->socialite = $socialite;
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
		
		Auth::login($user);

		return view('home');
	}

	private function getFacebookUser()
	{
		return $this->socialite->driver('facebook')->user();
	}

	private function findByEmailOrCreate($userData)
	{
		//Cria o usuário com base no email cadastrado no Fb
		$user = User::firstOrCreate([
			'email' => $userData->email
		]);
/*
		$user->username = $userData->name;
		$user->avatar = $userData->avatar;
		$user->save();
*/
		$facebookData = $user->facebookData();
/*
		$facebookData->save();
			*/
			echo "userdata";
		var_dump($userData);

			echo "user";
		var_dump($user);
			echo "facebookData";
		var_dump($facebookData);
		return $user;
	}

}
