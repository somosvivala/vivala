<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaFkLocalExperiencia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('experiencias', function(Blueprint $table)
		{
        //Campos para a relacao polimorfica de local,
        //assim experiencias podem pertencer a mais de 1 tipo de local (cidade, etc..)
        $table->integer('local_id')->nullable();
        $table->string('local_type')->nullable();
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
        //dropando colunas para o rollback funcionar direitinho
        $table->dropColumn(['local_id', 'local_type']);
		});
	}

}
