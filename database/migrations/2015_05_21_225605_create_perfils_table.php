<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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
			$table->string('nome_completo')->unsigned();
			$table->string('apelido')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->date('aniversario')->default(Carbon::now());
			$table->string('cidade_natal')->nullable();
			$table->string('ultimo_local')->nullable();
			$table->string('foto')->nullable();

			$table->timestamps();


			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});

		Schema::create('perfil_follow_perfil', function(Blueprint $table)
		{
			$table->integer('perfil_seguidor_id')->unsigned()->index();
			$table->foreign('perfil_seguidor_id')
				->references('id')
				->on('perfils')
				->onDelete('cascade');

			$table->integer('perfil_seguido_id')->unsigned()->index();
			$table->foreign('perfil_seguido_id')
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
		Schema::drop('perfil_follow_perfil');
		Schema::drop('perfils');
	}

}
