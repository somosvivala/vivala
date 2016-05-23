<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaExperienciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria_experiencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

      $table->string('nome')->nullable();

      //url do icone?
      $table->string('icone')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categoria_experiencias');
	}

}
