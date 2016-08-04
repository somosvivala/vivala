<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experiencias', function(Blueprint $table)
		{
        $table->increments('id');
        $table->timestamps();

        //Campos para a relacao polimorfica,
        //assim experiencias podem pertencer a mais de 1 tipo de entidade
        $table->integer('owner_id')->nullable();
        $table->string('owner_type')->nullable();

        $table->string('owner_nome')->nullable();
        $table->text('owner_descricao')->nullable();


        //campos com as informacoes da experiencias
        $table->string('endereco_completo')->nullable();
        $table->decimal('preco', 7, 2)->nullable();
        $table->text('descricao')->nullable();
        $table->text('descricao_na_listagem')->nullable();
        $table->text('detalhes')->nullable();

        //status da experiencia, se esta em analise, publicada, se já foi realizada (finalizada) etc..
        $table->enum('status', ['analise', 'publicada', 'finalizada'])->default('analise');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('experiencias');
	}

}
