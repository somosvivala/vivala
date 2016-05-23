<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteracaoPlataformasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interacao_plataformas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			//Campos para a relacao polimorfica (autor da acao em questao)
			$table->integer('author_id')->nullable();
			$table->string('author_type')->nullable();

      //Campos referentes a acao
			$table->string('tipo')->nullable(); //idealmente algo do tipo click.barralateral.hospedagem
			$table->string('descricao')->nullable(); //uma descricao da acao que ocorreu
      $table->string('url')->nullable(); //uma url onde ocorreu a acao(possivelmente nao vai ser usada)
      $table->string('extra')->nullable(); //caso alguma informacao extra seja necessaria

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('interacao_plataformas');
	}

}
