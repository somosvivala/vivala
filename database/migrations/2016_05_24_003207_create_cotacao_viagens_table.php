<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacaoViagensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cotacao_viagens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			//Fk para usuario, uma cotacao sempre pertence a um usuario
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->json('cotacao_obj');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cotacao_viagens');
	}

}
