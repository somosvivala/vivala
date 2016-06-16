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
            $table->string('boleto_sequencial');
            $table->string('boleto_pagador_nome');
            $table->string('boleto_pagador_cprf');
            $table->string('boleto_pagador_endereco_cep');
            $table->string('boleto_pagador_endereco_uf');
            $table->string('boleto_pagador_endereco_localidade');
            $table->string('boleto_pagador_endereco_bairro');
            $table->string('boleto_pagador_endereco_logradouro');
            $table->string('boleto_pagador_endereco_numero');
            $table->string('boleto_pagador_endereco_complemento')->nullable();

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
