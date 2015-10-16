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
			$table->string('nome_completo')->nullable();
			$table->string('apelido')->nullable();
			$table->string('genero')->nullable();
			$table->integer('user_id')->unsigned();
			$table->date('aniversario')->nullable();
			$table->enum('apoiador', ['A', 'B'])->nullable();
			//cidade atual / natal / ultimo local
			$table->string('cidade_atual')->nullable();
			$table->string('cidade_natal')->nullable();
			$table->string('ultimo_local')->nullable();

			$table->text('descricao_curta')->nullable();
			$table->text('descricao_longa')->nullable();
			$table->timestamps();

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
		Schema::drop('perfils');
	}

}
