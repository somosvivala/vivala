<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrettyUrlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Tabela de PrettyUrls de usuarios, paginas e possiveis outros tipos
		Schema::create('pretty_urls', function(Blueprint $table) {
			$table->increments('id');
			$table->string('stri_url_prettyUrls', 50)->unique();
			$table->enum('enum_tipo_prettyUrls', ['usuario', 'ong', 'empresa'])->nullable();
			$table->timestamps();
			$table->integer('prettyurl_id');
			$table->integer('prettyurl_type');

		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pretty_urls');
	}

}	