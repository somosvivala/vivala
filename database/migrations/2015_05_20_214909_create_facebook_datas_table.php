<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facebook_datas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_birthday')->nullable();
			$table->string('user_hometown')->nullable();
			$table->string('user_likes')->nullable();
			$table->string('user_location')->nullable();
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
		Schema::drop('facebook_datas');
	}

}
