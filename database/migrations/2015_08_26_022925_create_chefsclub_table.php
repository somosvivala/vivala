<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefsclubTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chefsclub', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('restaurante');
			$table->string('endereco');
			$table->string('tipo_cozinha');
			$table->integer('preco');
			$table->string('imagem');
			$table->string('beneficio');
			$table->string('horario');
			$table->string('telefone');
			$table->string('desconto');
			$table->string('url');
		});

		if (strcasecmp(env('DB_DRIVER'), 'pgsql') == 0) {
			DB::statement('ALTER TABLE chefsclub ADD COLUMN posicao geometry(Point,4326) NULL;');
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chefsclub');
	}

}
