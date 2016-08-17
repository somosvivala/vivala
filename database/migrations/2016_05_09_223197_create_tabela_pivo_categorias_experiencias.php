<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelaPivoCategoriasExperiencias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria_experiencia_experiencia', function(Blueprint $table)
		{
        $table->integer('categoria_experiencia_id')->unsigned();
        $table->foreign('categoria_experiencia_id')
            ->references('id')
            ->on('categoria_experiencias');

        $table->integer('experiencia_id')->unsigned();
        $table->foreign('experiencia_id')
            ->references('id')
            ->on('experiencias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categoria_experiencia_experiencia');
  }
}
