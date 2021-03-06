<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Services\ExperienciasRegistrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\JsonResponse;

class MobileAuthController extends Controller
{

    //Por padrao redireciona para as experiencias
    protected $redirectTo = '/experiencias/';

    //Por padrao o loginpath é
    protected $loginPath = '/autenticacao/login';

  /*
      |-------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
   */
    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     * Mudei da o typehinting da interface para a implementacao,
     * assim esse controller usara do ExperienciasRegistrar
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\ExperienciasRegistrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, ExperienciasRegistrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Metodo que recebe a request de Registro
     */
    public function postRegister(Request $request)
    {

        //usando o metodo validator do ExperienciasRegistrar para validar a request
        $validator = $this->registrar->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //usa o metodo login do Guard, que tem o tratamento interno de login
        $this->auth->login($this->registrar->create($request->all()));
        $user = $this->auth->user();

        Session::put('entidadeAtiva_id', $user->perfil->id);
        Session::put('entidadeAtiva_tipo', "perfil");

        /** Se for um ajax entao retornar um json **/
        if ( $request->ajax() ) {
            return ['success' => true];
        }

        return redirect($this->redirectPath());
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            /** Se for uma request por ajax **/
            if ( $request->ajax() ) {
                return [
                    'success' => true,
                    'redirectPath' => $this->redirectPath()
                ];
            }

            return redirect()->intended($this->redirectPath());
        }

        $errors = [ 'responseJSON' => [
            'email' => 'Dados incorretos'
        ]];

        return new JsonResponse($errors, 422);

    }

    /**
     * Metodo que recebe a request de Logout
     */
    public function postLogout(Request $request)
    {
        $request->session()->flush();
    }

    /**
     * Metodo para servir a view de login para mobile
     */
    public function getLogin(Request $request) {
        return view('mobilelogin');
    }

    /**
     * Metodo para servir a view de cadastro para mobile
     */
    public function getCadastro(Request $request) {
        return view('mobilecadastro');
    }
}
