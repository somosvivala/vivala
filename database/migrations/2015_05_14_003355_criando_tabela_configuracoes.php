<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaConfiguracoes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Criando tabela de Configuracoes, para padronização de código
		//e evitar valores hardcoded
		Schema::create('configuracaos', function(Blueprint $table){
			$table->increments('id');
			$table->string('nome');
			$table->text('valor');
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
		Schema::drop('configuracaos');
	}

}
