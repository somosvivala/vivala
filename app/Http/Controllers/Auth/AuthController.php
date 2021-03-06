<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;

use Illuminate\Support\Facades\Session;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	use AuthenticatesAndRegistersUsers;

  //overriding a propriedade $redirectTo, aplica para o login e o register  
  protected $redirectTo = '/viajar';


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	//overriding o postRegister Method, assim apos o registro vai pro /home
	public function postRegister(Request $request)
    {

        $validator = $this->registrar->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->auth->login($this->registrar->create($request->all()));
        $user = $this->auth->user();
        
        Session::put('entidadeAtiva_id', $user->perfil->id);
    	Session::put('entidadeAtiva_tipo', "perfil");
        return redirect('/quiz');
    }

    public function postLogout(Request $request) 
    {
    	$request->session()->flush();
    }

	/**
	 * Overriding no postLogin para conseguir redirecionar para a rota correta
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
         /** Criando instancia de um Validator especificando suas regras */
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /* Usando metodo setAttributeNames do Validator para mostrar 'nice names' nas mensagens de erro */
        $validator->setAttributeNames([
            'email' => 'email',
            'password' => 'senha'
        ]);

        if ($validator->fails())
        {

            return redirect('auth/login')
                ->withInput($request->only('email', 'remember'))
                ->withErrors($validator->messages());
        }

		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}


        /* Se chegou aqui entao o login/user estao errados */
        return redirect('auth/login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Não encontramos um usuário com essas credencias'
            ]);

	}




}
