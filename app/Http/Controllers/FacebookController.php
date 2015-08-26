<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory as Socialite; 
use Auth;
use App\User;
use App\FacebookData;
use App\PrettyUrl;
use Carbon\Carbon;
use App\Perfil;
use App\Foto;

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

		return	redirect('/home');
	}

	private function getFacebookUser()
	{
		return $this->socialite->driver('facebook')->user();
	}

	/**
	 * Se nao encontrar, cria um novo usuario e redireciona-o para o quiz
	 * @return User | Redirect           
	 */
	private function findByEmailOrCreate($userData)
	{
		//Procura/Cria o usuário com base no email cadastrado no Fb
		$user = User::first();
		$isNewUser = ($user == null);

		//Se for um novo usuario
		if ($isNewUser) {

			$user = User::firstOrCreate([
				'email' => $userData->email
			]);

			//Atualiza o usuário com os dados do Fb
			$user->username = $userData->name;
			$user->fb_token = $userData->token;
			$user->save();

			//criando perfil para usuario		
			$perfil = new Perfil;
			$perfil->nome_completo = $userData->name;
			$perfil->apelido = $userData->name;
        	$perfil->user_id = $user->id;
        	$perfil->save();
	
	        /**
	         * Criando uma prettyUrl para o novo usuario (username_currentTimestamp)
	         */
	        $prettyUrl = new PrettyUrl();
	        $prettyUrl->url = $user->username . '_' . Carbon::now()->getTimestamp();
	        $prettyUrl->tipo = 'usuario';
	        $perfil->prettyUrl()->save($prettyUrl);

	    //Caso o usuario ja exista, só ainda nao tinha feito login com o facebook
		} else {
			$perfil = $user->perfil;
		}

		$fotoPerfil = new Foto(['path' => $userData->avatar, 'tipo' => 'avatar']);
		$perfil->fotos()->save($fotoPerfil);

		//Atualiza a tabela de dados do Fb
		$facebookData = $user->facebookData ? $user->facebookData : new FacebookData();

		if(isset($userData->user_birthday))
			$facebookData->user_birthday = $userData->user_birthday;
		if(isset($userData->user_hometown))
			$facebookData->user_hometown = $userData->user_hometown;
		if(isset($userData->user_likes))
			$facebookData->user_likes = $userData->user_likes;
		if(isset($userData->user_location))
			$facebookData->user_location = $userData->user_location;

		$user->facebookData()->save($facebookData);
		

		if ($isNewUser) {
			Auth::login($user);
			return redirect('/quiz');
		}

		return $user;
	}

}
