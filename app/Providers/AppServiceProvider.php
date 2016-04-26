<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
      //Fornece os dados para as views que são chamadas na sidebar
      view()->composer('conectar._sugestoesviajantes', 'App\Http\Controllers\ConectarController@getSugestoesViajantes');
      view()->composer('cuidar.sugestoesongs', 'App\Http\Controllers\CuidarController@getSugestoesOngs');
      view()->composer('viajar.sugestoesempresas', 'App\Http\Controllers\ViajarController@getSugestoesempresas');
      //view()->composer('feed', 'App\Http\Controllers\FeedController@getFeeds'); //comentado pra não poluir as outras paginas
      view()->composer('_notificacoesFollow', 'App\Http\Controllers\NotificacaoController@getNotificacoesfollow');
      view()->composer('_notificacoesMsg', 'App\Http\Controllers\NotificacaoController@getNotificacoesMsg');
      view()->composer('_notificacoesGeral', 'App\Http\Controllers\NotificacaoController@getNotificacoesgeral');

      // Passa outras páginas do usuario e dados da entidade ativa no
      // momento
      view()->composer('header', 'App\Http\Controllers\PaginaController@getMenu');

	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
      $this->app->bind(
          'Illuminate\Contracts\Auth\Registrar',
          'App\Services\Registrar'
      );
	}
}
