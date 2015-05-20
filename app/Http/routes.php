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
