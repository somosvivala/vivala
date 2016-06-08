<?php namespace App\Http\Middleware;

use Closure;
use Agent;

/**
 * Middleware para evitar que rotas acessiveis apenas pelo desktop sejam acessadas pelo mobile
 * quand for uma request de um mobile, redirecionamos para /experiencias
 */
class DesktopOnly
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //se for mobile enviar para as experiencias
        if (Agent::isMobile())
            return redirect('/experiencias');

        return $next($request);
    }
}

