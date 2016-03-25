<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatorioClickbusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relatorio_clickbuses', function(Blueprint $table)
		{
        $table->increments('id');
        $table->timestamps();

        $table->string('localizer')->nullable();
        $table->string('rota_origem')->nullable();
        $table->string('rota_destino')->nullable();
        $table->string('buyer_firstname')->nullable();
        $table->string('buyer_lastname')->nullable();
        $table->string('buyer_email')->nullable();
        $table->string('payment_method')->nullable();
        $table->string("order_created_at")->nullable();
        $table->string("order_updated_at")->nullable();
        $table->string('clickbus_order_id')->nullable();
        $table->string('quantidade_bilhetes')->nullable();

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
		Schema::drop('relatorio_clickbuses');
	}

}
