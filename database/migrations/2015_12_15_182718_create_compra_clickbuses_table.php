<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraClickbusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compra_clickbuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

                        //FK para users (usuario que fez a compra)
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
                
                        //content.localizer da compra usado para qualquer 
                        //UPDATE order
			$table->string('localizer')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compra_clickbuses');
	}

}
