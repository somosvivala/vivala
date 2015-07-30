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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comentarios');
	}

}
