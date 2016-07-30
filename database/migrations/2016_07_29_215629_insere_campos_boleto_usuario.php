<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsereCamposBoletoUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
        $table->string('cpf')->nullable();
        $table->string('endereco_cep')->nullable();
        $table->string('endereco_uf')->nullable();
        $table->string('endereco_localidade')->nullable();
        $table->string('endereco_bairro')->nullable();
        $table->string('endereco_logradouro')->nullable();
        $table->string('endereco_numero')->nullable();
        $table->string('endereco_complemento')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
        $table->dropColumn('cpf');
        $table->dropColumn('endereco_cep');
        $table->dropColumn('endereco_uf');
        $table->dropColumn('endereco_localidade');
        $table->dropColumn('endereco_bairro');
        $table->dropColumn('endereco_logradouro');
        $table->dropColumn('endereco_numero');
        $table->dropColumn('endereco_complemento');
		});
	}

}
