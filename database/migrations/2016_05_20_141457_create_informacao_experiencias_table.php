<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacaoExperienciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      /**
       * Tabela para guardar as informacoes que serao descritas por
       * icone - descricao
       * nas experiencias. Assim podemos criar novas conforme a necessidade
       */
		Schema::create('informacao_experiencias', function(Blueprint $table)
		{
        $table->increments('id');
        $table->timestamps();

        $table->string("icone")->default('fa fa-star');
        $table->string("descricao")->nullable();

        //FK para experiencia
        $table->integer('experiencia_id')->unsigned()->nullable();
        $table->foreign('experiencia_id')
            ->references('id')
            ->on('experiencias')
            ->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('informacao_experiencias');
	}

}
