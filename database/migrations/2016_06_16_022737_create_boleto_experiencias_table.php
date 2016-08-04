<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletoExperienciasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleto_experiencias', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->date('data_emissao');
            $table->date('data_vencimento');
            $table->decimal('valor', 7, 2);

            $table->string('instrucao')->nullable();
            $table->string('token')->nullable();

            //status do boleto (caso a criacao falhe)
            $table->enum('status', ['nao_gerado', 'gerado', 'pago', 'outro'])->default('nao_gerado');

            //FK para User, para saber de qual usuario é esse boleto
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            //FK para inscricaoExperiencia (a inscricao a qual esse boleto é associado)
            $table->integer('inscricao_experiencia_id')->unsigned()->nullable();
            $table->foreign('inscricao_experiencia_id')
                ->references('id')
                ->on('inscricao_experiencias')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boleto_experiencias');
    }

}
