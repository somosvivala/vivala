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
			$table->increments('ainc_id_configuracao');
			$table->string('char_nome_configuracao');
			$table->text('text_valor_configuracao');
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
		Schema::drop('configuracao');
	}

}
