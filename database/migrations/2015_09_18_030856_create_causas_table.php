<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('causas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('habilidades')->nullable();
			$table->string('sobre_trabalho')->nullable();
			$table->timestamps();

			//endereço
			$table->string('logradouro')->nullable();
			$table->integer('cep')->nullable(); 	
			$table->string('bairro')->nullable();
			$table->string('complemento')->nullable();

			//TODO: substituir colunas por relacao com os models Cidade e Estado
			$table->string('estado')->nullable();
			$table->string('cidade')->nullable();
			$table->integer('quantidade_vagas')->nullable();

			//FK para relacao polimorfica de 
			//usando só para ong por enquanto. representa quem promove a ong
			$table->integer('owner_id')->nullable();
			$table->string('owner_type')->nullable();

			//uma causa sempre tem um perfil responsavel
			$table->integer('responsavel_id')->unsigned()->nullable();
			$table->foreign('responsavel_id')
				->references('id')
				->on('perfils');
		});

		Schema::create('causa_perfil', function(Blueprint $table)
		{
			//uma causa tem varios perfils voluntarios
			$table->integer('perfil_id')->unsigned();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils');

			$table->integer('causa_id')->unsigned();
			$table->foreign('causa_id')
				->references('id')
				->on('causas');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('causa_perfil');
		Schema::drop('causas');
	}

}
