<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vagas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('habilidades')->nullable();
			$table->string('sobre_trabalho')->nullable();
			$table->timestamps();

			//endereço
			$table->string('logradouro')->nullable();
			$table->string('cep')->nullable(); 	
			$table->string('bairro')->nullable();
			$table->string('complemento')->nullable();
			$table->string('horario_funcionamento')->nullable();

                        //Campos contato
			$table->string('email_contato')->nullable();
			$table->string('telefone_contato')->nullable();
                        
                        
                        //FK para cidades 
			$table->integer('cidade_id')->unsigned()->nullable();
			$table->foreign('cidade_id')
				->references('id')
				->on('cidades');
                        
                        $table->integer('quantidade_vagas')->nullable();
                        $table->integer('numero_beneficiados')->nullable();

			//FK para categoria_ong
			$table->integer('categoria_vaga_id')->unsigned()->nullable();
			$table->foreign('categoria_vaga_id')
				->references('id')
				->on('categoria_vagas');

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

		Schema::create('perfil_vaga', function(Blueprint $table)
		{
			//uma causa tem varios perfils voluntarios
                        $table->integer('perfil_id')->unsigned()->nullable();
			$table->foreign('perfil_id')
				->references('id')
                                ->on('perfils');

                        $table->integer('vaga_id')->unsigned()->nullable();
			$table->foreign('vaga_id')
				->references('id')
				->on('vagas');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perfil_vaga');
		Schema::drop('vagas');
	}

}
