<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataOcorrenciaExperienciasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ocorrencia_experiencias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            //data em que ira acontecer a experiencia
            $table->date('data_ocorrencia');

            //FK para experiencias (experiencia que ira ocorrer em tal data)
            $table->integer('experiencia_id')->unsigned()->nullable();
            $table->foreign('experiencia_id')
                ->references('id')
                ->on('experiencias')
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
        Schema::drop('data_ocorrencia_experiencias');
    }

}
