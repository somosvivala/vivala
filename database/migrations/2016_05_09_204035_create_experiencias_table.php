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

        //campos com as informacoes da experiencias
        $table->string('titulo')->nullable();
        $table->string('descricao')->nullable();
        $table->decimal('preco', 7, 2)->nullable();

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
