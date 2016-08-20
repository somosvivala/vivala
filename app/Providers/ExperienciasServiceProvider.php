<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\InscricaoExperiencia;
use App\Experiencia;

class ExperienciasServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
      $this->runViewComposerStuff();

      //Bindando Model Event deleting de Experiencia para remover também as relacoes dependentes
      Experiencia::deleting(function ($Experiencia) {
          $Experiencia->inscricoes()->delete();
          $Experiencia->informacoes()->delete();
          $Experiencia->ocorrencias()->delete();
          $Experiencia->fotos()->delete();
      });

      //Bindando Model Event deleting de InscricaoExperiencia para remover também as relacoes dependentes
      InscricaoExperiencia::deleting(function ($Inscricao) {
          $Inscricao->boleto()->delete();
        });

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

      //bindando a interface com a implementacao,
      //assim o laravel servira automaticamente uma intancia
      //de BoletoCloudRepository quando requisitada nos controllers
      $this->app->bind(
          'App\Interfaces\BoletoCloudRepositoryInterface',
          'App\Repositories\BoletoCloudRepository'
      );
	}

  /**
   * Metodo para fazer as views composer
   */
  public function runViewComposerStuff()
  {
      //Bindando as views que precisam de Experiencias
      view()->composer('gestao.experiencias._inscricoesexperiencias', 'App\Repositories\ExperienciasRepository@injectAllExperiencias');
      view()->composer('gestao.experiencias._inscricoescanceladasexperiencias', 'App\Repositories\ExperienciasRepository@injectAllExperiencias');
      view()->composer('gestao.experiencias._listaexperiencias', 'App\Repositories\ExperienciasRepository@injectAllExperiencias');

      //Bindando views que precisam de CategoriaExperiencia
      view()->composer('gestao.experiencias._categoriasexperiencias', 'App\Repositories\ExperienciasRepository@injectAllCategorias');
      view()->composer('experiencias.form', 'App\Repositories\ExperienciasRepository@injectAllCategorias');

      //Bindando views que precisam de CategoriaExperiencia
      view()->composer('experiencias.form', 'App\Repositories\ExperienciasRepository@injectAllDiasDaSemana');

      //Bindando views que precisam de Ongs
      view()->composer('experiencias.form', 'App\Repositories\OngRepository@injectOngsParaSelect');

      //Bindando views do /viajar que precisam de informacoes
      view()->composer('chefsclub.buscarestaurantes', 'App\Http\Controllers\ViajarController@getInjectInformacoesViajar');

      //todo pegar outas informacoes necessarias para a ong

  }



}
