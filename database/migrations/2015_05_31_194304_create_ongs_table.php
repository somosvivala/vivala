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
			$table->string('apelido')->nullable();
			$table->timestamps();

			$table->enum('categoria', ['tipo1', 'tipo2', 'tipo3'])->nullable();			

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Drop ongs table
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ongs');
	}

}
