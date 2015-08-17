<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interesses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->timestamps();
		});
	

		//Tabela de relacao interesses x perfil (NxN)
		Schema::create('interesse_perfil', function(Blueprint $table)
		{
			$table->timestamps();

			$table->integer('perfil_id')->unsigned()->index()->nullable();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils')
				->onDelete('cascade');

			$table->integer('interesse_id')->unsigned()->index()->nullable();
			$table->foreign('interesse_id')
				->references('id')
				->on('interesses')
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
		Schema::drop('interesse_perfil');
		Schema::drop('interesses');
	}

}
