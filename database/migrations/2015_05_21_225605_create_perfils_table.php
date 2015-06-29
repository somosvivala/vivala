<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfils', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->date('aniversario')->nullable();
			$table->string('cidade_natal')->nullable();
			$table->string('ultimo_local')->nullable();
			$table->timestamps();


			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});

		Schema::create('follow_perfil', function(Blueprint $table)
		{
			$table->integer('perfil_id')->unsigned()->index();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils')
				->onDelete('cascade');

			$table->integer('follow_id')->unsigned()->index();
			$table->foreign('follow_id')
				->references('id')
				->on('perfils')
				->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('follow_perfil');
		Schema::drop('perfils');
	}

}
