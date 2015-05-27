<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingPrettyUrlToPerfils extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('perfils', function(Blueprint $table)
		{
			$table->integer('prettyUrl_id');
			$table->foreign('prettyUrl_id')
				->references('id')
				->on('pretty_urls')
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
		Schema::table('perfils', function(Blueprint $table)
		{
			$table->dropColumn('prettyUrl_id');
		});
	}

}
