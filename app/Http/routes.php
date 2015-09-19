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
Route::get('fbLogin', 'FacebookController@fbLogin');
Route::get('config', 'ConfigController@index');

Route::resource('configuracao','ConfiguracaoController');
Route::resource('ong','OngController');
Route::resource('empresa','EmpresaController');
Route::resource('post','PostController');
Route::resource('albums','AlbumController');

// Mostra dados do post por ajax
Route::get('postajax/{id}/{secao}', 'PostController@show');
Route::controller('post','PostController');
Route::controller('albums','AlbumController');
Route::controller('notificacoes','NotificacaoController');
Route::controller('paginas','PaginaController');


// Rotas dos três pilares do sistema
Route::resource('viajar','ViajarController');
Route::resource('cuidar','CuidarController');
Route::resource('conectar','ConectarController');

/* 
 * Rotas especificas das áreas internas
 */

// Rota para sugestoes de viajantes
Route::get('sugestoesviajantes','SugestaoController@getViajantes');
Route::get('sugestoesviajantes/{filtro}','SugestaoController@getViajantes');

Route::controller('perfilviajante','Conectar\PerfilViajanteController');
Route::controller('roteiros','Conectar\RoteirosController');
Route::controller('interesses','Conectar\InteressesController');
Route::controller('chat','Conectar\ChatController');

Route::controller('montarviagem','Viajar\MontarViagemController');
Route::controller('verpacotes','Viajar\VerPacotesController');
Route::controller('meusfavoritos','Viajar\MeusFavoritosController');
Route::controller('minhascompras','Viajar\MinhasComprasController');
Route::controller('meuspontos','Viajar\MeusPontosController');
Route::controller('buscasrecentes','Viajar\BuscasRecentesController');

Route::controller('perfilatuante','Cuidar\PerfilAtuanteController');
Route::controller('vagas','Cuidar\VagasController');
Route::controller('feed','Cuidar\FeedController');

Route::controller('home', 'HomeController');
Route::controller('foto', 'FotoController');
Route::controller('ajax', 'AjaxController');
Route::controller('perfilcontroller','PerfilController');
Route::controller('comentario', 'ComentariosController');
Route::controller('quiz', 'QuizController');

Route::post('quimera', 'QuimeraController@quimera');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 * Aqui faço o tratamento para a prettyUrl, retornando um objeto da classe PrettyUrl
 */
Route::bind('prettyURL', function($value, $route)
{
	$prettyUrl = App\PrettyUrl::all()->where('url', $value)->first();
	return $prettyUrl;
});



/**
 * Aqui ficam as rotas que vao passar por autenticação. (filtro auth)
 */
Route::group(['before' => 'auth'], function() {
	Route::get('perfil', 'PerfilController@index');
	Route::get('editarPerfil', 'PerfilController@edit');
	Route::post('editarPerfil/{id}', 'PerfilController@update');
	Route::post('editarPerfilFoto/{id}', 'PerfilController@updatePhoto');
	Route::post('cropPhotoPerfil/{id}', 'PerfilController@cropPhoto');

	Route::post('cropPhotoOng/{id}', 'OngController@cropPhoto');
	Route::post('cropPhotoEmpresa/{id}', 'EmpresaController@cropPhoto');
	Route::post('cropPhotoPost/{id}', 'PostController@cropPhoto');
});


/**
 * Aqui fica a rota que redireciona a prettyUrl para os Controllers
 */
Route::get('{prettyURL}', function($prettyUrl=null) {

	if (!is_null($prettyUrl)) {
		switch ($prettyUrl->prettyurlable_type) {
			case 'App\Ong':
				$ong = App\Ong::find($prettyUrl->prettyurlable_id);
				Session::put('ong', $ong);
				return redirect('ong/'.$prettyUrl->url);
				break;
			case 'App\Perfil':
				$user = App\Perfil::find($prettyUrl->prettyurlable_id);
				Session::put('perfil', $user);
				return redirect('perfil/'.$prettyUrl->url);
				break;
			case 'App\Empresa':
				$empresa = App\Empresa::find($prettyUrl->prettyurlable_id);
				Session::put('empresa', $empresa);
				return redirect('empresa/'.$prettyUrl->url);
				break;

			default:
				break;
		}
	}

	dd("rota até o fim, entidade nao encontrada --> 404", $prettyUrl);
});


Route::get("ong/{ong}", "OngController@index");
Route::get("perfil/{perfil}", "PerfilController@showUserProfile");
Route::get("empresa/{empresa}", "EmpresaController@index");
