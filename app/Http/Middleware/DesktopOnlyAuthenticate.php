<?php namespace App\Http\Middleware;

use Closure;
use Agent;
use Illuminate\Contracts\Auth\Guard;

class DesktopOnlyAuthenticate
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //se for mobile só continuar
        if (Agent::isMobile()) {
            return $next($request);
        }

        else {
            //se chegar aqui é desktop e portanto precisa ser autenticado
            if ($this->auth->guest())
            {
                if ($request->ajax())
                {
                    return response('Unauthorized.', 401);
                }
                else
                {
                    return redirect()->guest('/');
                }
            }

            //se for desk e ja estiver logado entao sem problema, prosseguir
            return $next($request);
        }
    }
}
