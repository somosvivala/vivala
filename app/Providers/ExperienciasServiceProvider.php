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
      //Bindando as views que precisam de Experiencias
      view()->composer('gestao.experiencias._inscricoesexperiencias', 'App\Repositories\ExperienciasRepository@injectAllExperiencias');

      view()->composer('gestao.experiencias._listaexperiencias', 'App\Repositories\ExperienciasRepository@injectAllExperiencias');

      view()->composer('gestao.experiencias._categoriasexperiencias', 'App\Repositories\ExperienciasRepository@injectAllCategorias');


      //Bindando views que precisam de CategoriaExperiencia
      view()->composer('experiencias.form', 'App\Repositories\ExperienciasRepository@injectAllCategorias');

      //Bindando views que precisam de Ongs
      view()->composer('experiencias.form', 'App\Repositories\OngRepository@injectOngsParaSelect');
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
