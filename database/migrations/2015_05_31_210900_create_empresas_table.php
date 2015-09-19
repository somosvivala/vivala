<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
			$table->string('apelido')->nullable();
			$table->timestamps();

			//FK para categoria_ong
			$table->integer('categoria_id')->unsigned();
			$table->foreign('categoria_id')
				->references('id')
				->on('categoria_ong')
				->onDelete('cascade');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
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
		Schema::drop('empresas');
	}

}
