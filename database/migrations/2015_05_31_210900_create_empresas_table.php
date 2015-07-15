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
			$table->string('foto')->nullable();
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');	
		});

		Schema::create('perfil_follow_empresa', function(Blueprint $table)
		{
			$table->integer('perfil_seguidor_id')->unsigned()->index();
			$table->foreign('perfil_seguidor_id')
				->references('id')
				->on('empresas')
				->onDelete('cascade');

			$table->integer('empresa_seguido_id')->unsigned()->index();
			$table->foreign('empresa_seguido_id')
				->references('id')
				->on('empresas')
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
		Schema::drop('empresas');
	}

}
