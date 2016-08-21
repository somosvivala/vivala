<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCamposResponsavelExperiencia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('experiencias', function(Blueprint $table)
		{
        //Adicionando campos sobre o responsavel pela experiencia (instituicao / empresa)
        $table->string('email_responsavel')->nullable();
        $table->string('url_facebook_responsavel')->nullable();
        $table->string('url_instagram_responsavel')->nullable();
        $table->string('url_externa_responsavel')->nullable();
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
        $table->dropColumn('email_responsavel')->nullable();
        $table->dropColumn('url_facebook_responsavel')->nullable();
        $table->dropColumn('url_instagram_responsavel')->nullable();
        $table->dropColumn('url_externa_responsavel')->nullable();
		});
	}

}
