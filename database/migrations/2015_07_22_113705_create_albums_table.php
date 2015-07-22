<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Cria a tabela de albums
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome')->nullable();
			$table->string('descricao')->nullable();
			$table->timestamps();

			//Campos para a relacao polimorfica,
			//assim album pode pertencer a qualquer entidade que implemente
			//MorphOne() ou MorphMany()
			$table->integer('owner_id');
			$table->string('owner_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('albums');
	}

}
