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
		view()->composer('conectar.sugestoesviajantes', 'App\Http\Controllers\ConectarController@getSugestoesViajantes');
		view()->composer('cuidar.sugestoesongs', 'App\Http\Controllers\CuidarController@getSugestoesOngs');
		view()->composer('viajar.sugestoesempresas', 'App\Http\Controllers\ViajarController@getSugestoesempresas');
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
