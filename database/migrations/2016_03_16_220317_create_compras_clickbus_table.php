<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasClickbusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_clickbus', function(Blueprint $table)
        {
            $table->increments('id');

            //timestamps para registrar a data de criacao/update da order
            $table->timestamps();

            //date para data de pagamento
            $table->date('data_pagamento')->nullable();

            //FK para users (usuario que fez a compra)
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            //para identificar se PF/PJ
            $table->string('buyer_document_type')->nullable();
            $table->string('buyer_document')->nullable();
            $table->string('buyer_nome_fantasia')->nullable();
            $table->string('buyer_razao_social')->nullable();

            //localizer para cancelamento
            $table->string('localizer')->nullable();
            $table->string('buyer_firstname')->nullable();
            $table->string('buyer_lastname')->nullable();
            $table->string('buyer_birthday')->nullable();
            $table->string('buyer_email')->nullable();
            $table->string('buyer_phone')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('voucher')->nullable();
            $table->string('voucher_discount')->nullable();
            $table->decimal('desconto_total', 7, 2)->nullable();
            $table->decimal('taxas', 7, 2)->nullable();
            $table->decimal('total', 7, 2)->nullable();

            //order_id para details
            $table->string('clickbus_order_id')->nullable();

            //status do pedido, usado para o /orders verificar o estado do pagamento
            $table->string('status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compras_clickbus');
    }

}
