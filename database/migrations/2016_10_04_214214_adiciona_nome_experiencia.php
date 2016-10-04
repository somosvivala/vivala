<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaNomeExperiencia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('experiencias', function(Blueprint $table)
		{
        $table->string('nome')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('experiencias', function(Blueprint $table)
		{
        $table->dropColumn('nome')->nullable();
		});
	}

}
