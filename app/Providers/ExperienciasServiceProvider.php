<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ExperienciasServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
      //Bindando as views que precisam de experiencias
      view()->composer('gestao._listaexperiencias', 'App\Repositories\ExperienciasRepository@injectAllExperiencias');
      view()->composer('experiencias.form', 'App\Repositories\ExperienciasRepository@injectAllCategorias');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
      //Bindando o name-resolution da Interface para o Repositorio
      $this->app->bind(
          'App\Interfaces\ExperienciasRepositoryInterface',
          'App\Repositories\ExperienciasRepository'
      );

	}

}
