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
			$table->string('url', 50)->unique();
			$table->enum('tipo', ['usuario', 'ong', 'empresa'])->nullable();
			$table->timestamps();
			$table->integer('prettyurlable_id');
			$table->string('prettyurlable_type');
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