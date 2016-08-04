<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaSoftdeleteFotos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fotos', function(Blueprint $table)
		{
        //inserindo a coluna deleted_at
        $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fotos', function(Blueprint $table)
		{
        //dropando a coluna deleted_at
        $table->dropSoftDeletes();
		});
	}

}
