<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo', 140)->nullable();
			$table->string('descricao', 500)->nullable();
			$table->string('video')->nullable();
			$table->enum('tipoPost', ['foto', 'video', 'album', 'publicidade', 'status', 'local'])->nullable();
			$table->timestamps();

			//Campos para a relacao polimorfica,
			//assim posts podem pertencer a qualquer entidade que implemente
			//morphOne() ou morphMany()
			$table->integer('author_id');
			$table->string('author_type');

		});

		Schema::create('entidade_like_post', function(Blueprint $table)
		{
			$table->integer('post_id')->unsigned()->index();
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade');

			$table->integer('perfil_id')->unsigned()->index()->nullable();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils')
				->onDelete('cascade');


			$table->integer('ong_id')->unsigned()->index()->nullable();
			$table->foreign('ong_id')
			->references('id')
			->on('ongs')
			->onDelete('cascade');


			$table->integer('empresa_id')->unsigned()->index()->nullable();
			$table->foreign('empresa_id')
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
		Schema::drop('entidade_like_post');
		Schema::drop('posts');
	}

}
