<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelaPivoCategoriasExperiencias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /**
     * O Laravel usa como padrao o nome dos models em ordem alfabetica quando busca a tabela pivo
     * em relacoes do tipo belongsToMany
     */
		Schema::table('categoriaexperiencia_experiencia', function(Blueprint $table)
		{
        $table->integer('categoriaexperiencia_id')->unsigned();
        $table->foreign('categoriaexperiencia_id')
            ->references('id')
            ->on('categoria_experiencias');

        $table->integer('experiencia_id')->unsigned();
        $table->foreign('experiencia_id')
            ->references('id')
            ->on('experiencias');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categoriaexperiencia_experiencia', function(Blueprint $table)
		{
			//
		});
	}

}
