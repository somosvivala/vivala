<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOngsTable extends Migration {

	/**
	 * Creating ongs table.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ongs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});


		Schema::create('perfil_follow_ong', function(Blueprint $table)
		{
			$table->integer('perfil_seguidor_id')->unsigned()->index();
			$table->foreign('perfil_seguidor_id')
				->references('id')
				->on('ongs')
				->onDelete('cascade');

			$table->integer('ong_seguido_id')->unsigned()->index();
			$table->foreign('ong_seguido_id')
				->references('id')
				->on('ongs')
				->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Drop ongs table
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perfil_follow_ong');
		Schema::drop('ongs');

	}

}
