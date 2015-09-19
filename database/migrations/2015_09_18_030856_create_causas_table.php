<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('causas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			//FK para relacao polimorfica de 
			//usando só para ong por enquanto. representa quem promove a ong
			$table->integer('owner_id')->nullable();
			$table->string('owner_type')->nullable();

			$table->string('habilidades')->nullable();
			$table->string('sobre_trabalho')->nullable();
			$table->string('local')->nullable();

			//uma causa sempre tem um perfil responsavel
			$table->integer('responsavel_id')->unsigned()->nullable();
			$table->foreign('responsavel_id')
				->references('id')
				->on('perfils');
		});

		Schema::create('causa_perfil', function(Blueprint $table)
		{
			//uma causa sempre tem um perfil responsavel
			$table->integer('perfil_id')->unsigned();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils');

			$table->integer('causa_id')->unsigned();
			$table->foreign('causa_id')
				->references('id')
				->on('causas');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('causa_perfil');
		Schema::drop('causas');
	}

}
