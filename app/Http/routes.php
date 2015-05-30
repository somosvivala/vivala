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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::bind('user', function($value, $route)
{
	$user = 
	App\PrettyUrl::where('stri_url_prettyUrls', $value)
		->firstOrFail()
		->perfil
		->user;

    return $user;
});

Route::group(['before' => 'auth'], function() {
	Route::get('perfil', 'PerfilController@index');
	Route::get('editarPerfil', 'PerfilController@edit');
	Route::post('editarPerfil/{id}', 'PerfilController@update');
	Route::post('editarPerfilFoto/{id}', 'PerfilController@updatePhoto');


	Route::get('{user}', 'PerfilController@showUserProfile');
});


