<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/






Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('fbLogin', 'FacebookController@fbLogin');

Route::resource('configuracao','ConfiguracaoController');

Route::post('perfil/editar/{id}', 'PerfilController@update');
Route::get('perfil', 'PerfilController@index');
Route::get('perfil/editar', 'PerfilController@edit');
Route::post('perfil/editar', 'PerfilController@update');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::bind('user', function($value, $route)
{
    return App\User::where('string_prettyUrl', $value)->first();
});

Route::get('perfil/{user}', 'PerfilController@showUserProfile');

Route::get('/{user}', function(App\User $user)
{
	if ( $user->exists ) {
		if ($user->string_prettyUrl == Auth::user()->string_prettyUrl) {
			return Redirect::to('perfil');	
		}

		return Redirect::to('perfil/'.$user->string_prettyUrl)->with( 'user', $user );		
	} else {
		return 'nao tem esse user nao';
	}
});
