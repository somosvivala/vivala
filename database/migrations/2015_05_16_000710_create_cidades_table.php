<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cidades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->timestamps();

			$table->integer('estado_id')->unsigned();
			$table->foreign('estado_id')
				->references('id')
				->on('estados');
		});

		if (strcasecmp(env('DB_DRIVER'), 'pgsql') == 0) {
			DB::statement('ALTER TABLE cidades ADD COLUMN posicao geometry(Point,4326) NULL;');
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cidades');
	}

}
