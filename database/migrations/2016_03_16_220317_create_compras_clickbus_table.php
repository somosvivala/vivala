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
			$table->timestamps();

			//FK para users (usuario que fez a compra)
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			//content.localizer da compra usado para qualquer
			//UPDATE order
			$table->string('localizer')->nullable();
			$table->string('buyer_firstname')->nullable();
			$table->string('buyer_lastname')->nullable();
			$table->string('buyer_birthday')->nullable();
			$table->string('buyer_document')->nullable();
			$table->string('buyer_document_type')->nullable();
			$table->string('buyer_phone')->nullable();
			$table->string('payment_method')->nullable();
			$table->string('voucher_use')->default(false);
			$table->string('voucher_number')->nullable();
			$table->string('voucher_discount')->nullable();
		  $table->string('total')->nullable();
			//status do pedido, usado para o /orders verificar o estado do pagamento
			$table->boolean('status')->default(false);
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
