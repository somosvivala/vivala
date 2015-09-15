<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notificacoes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->string('titulo', 85)->nullable();
			$table->string('mensagem', 200)->nullable();
			$table->enum('tipo_notificacao', ['post', 'comentario', 'seguidor', 'share', 'like_post', 'like_comentario', 'chat'])->nullable();
			$table->string('url')->nullable();


			$table->boolean('readed')->default(false);

			//FK para relacao polimorfica
			$table->integer('from_id')->nullable();
			$table->string('from_type')->nullable();

			//FK para relacao polimorfica
			$table->integer('target_id')->nullable();
			$table->string('target_type')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notificacoes');
	}

}
