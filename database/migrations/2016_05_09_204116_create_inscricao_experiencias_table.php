<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaoExperienciasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inscricao_experiencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

      $table->date('data_pagamento')->nullable();
      $table->date('data_cancelamento')->nullable();
      $table->date('data_ocorrencia_experiencia')->nullable();

      /**
       * quando se inscreve => pendente
       * quando confirma pagamento => confirmada
       * quando ocorrer a experiencia => confirmada -> realizada
       * quando ocorrer a experiencia => pendente -> expirada
       * se for cancelada => cancelada
       */
      $table->enum('status', [
          'pendente',
          'confirmada',
          'cancelada',
          'concluida',
          'expirada'
      ])->default('pendente');

      //FK para experiencia
			$table->integer('experiencia_id')->unsigned()->nullable();
			$table->foreign('experiencia_id')
				->references('id')
				->on('experiencias')
				->onDelete('cascade');

      //FK para perfil
			$table->integer('perfil_id')->unsigned()->nullable();
			$table->foreign('perfil_id')
				->references('id')
				->on('perfils')
				->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inscricao_experiencias');
	}

}
