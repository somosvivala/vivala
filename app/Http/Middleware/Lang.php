<?php namespace App\Http\Middleware;

use Closure, Session, Auth;

class Lang {

    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['pt','en','es'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('locale'))
        {
            Session::put('locale', 'pt');
        }

        if( $request->input('idioma') !== null )
        {
            Session::put('locale', $request->input('idioma'));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }

}
