<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOngsTable extends Migration {

	/**
	 * Creating ongs table.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ongs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->string('apelido')->nullable();
			$table->string('descricao')->nullable();
			$table->string('horario_funcionamento')->nullable();
			$table->timestamps();
			
			//endereço
			$table->string('logradouro')->nullable();
			$table->integer('cep')->nullable();
			$table->string('bairro')->nullable();
			$table->string('complemento')->nullable();

			// Urls dessa ong, futuramente podemos extrair dados dessas 
			// fontes para popular a base
			$table->string('url_facebook')->nullable();
			$table->string('url_gplus')->nullable();
			$table->string('url_instagram')->nullable();
			$table->string('url_site')->nullable();

                        //FK para cidades 
			$table->integer('cidade_id')->unsigned()->nullable();
			$table->foreign('cidade_id')
				->references('id')
				->on('cidades')
				->onDelete('cascade');

			
			//FK para categoria_ong
			$table->integer('categoria_ong_id')->unsigned()->nullable();
			$table->foreign('categoria_ong_id')
				->references('id')
				->on('categoria_ongs')
				->onDelete('cascade');

			//Fk para usuario, uma ong sempre pertence a um usuario
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			//uma ong sempre tem um perfil responsavel
			$table->integer('responsavel_id')->unsigned()->nullable();
			$table->foreign('responsavel_id')
				->references('id')
				->on('perfils');

		});


		Schema::create('ong_perfil', function(Blueprint $table)
		{
			//uma ong tem varios perfils voluntarios
			$table->integer('perfil_id')->unsigned();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils');

			$table->integer('ong_id')->unsigned();
			$table->foreign('ong_id')
				->references('id')
				->on('ongs');
		});
	}

	/**
	 * Drop ongs table
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ong_perfil');
		Schema::drop('ongs');
	}

}
