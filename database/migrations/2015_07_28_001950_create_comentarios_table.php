<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('conteudo');
			$table->timestamps();

			//Campos para a relacao polimorfica,
			//assim comentarios podem pertencer a qualquer entidade que implemente
			//MorphOne() ou MorphMany()
			$table->integer('author_id');
			$table->string('author_type');


			//FK para onde qual post o comentario pertence 
			$table->integer('post_id')->unsigned();
			$table->foreign('post_id')
				->references('id')
				->on('posts');
		});

		Schema::create('entidade_like_comentario', function(Blueprint $table)
		{
			$table->integer('comentario_id')->unsigned()->index();
			$table->foreign('comentario_id')
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
		Schema::drop('entidade_like_comentario');
		Schema::drop('comentarios');
	}

}
