<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasClickbusPoltronasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compras_clickbus_poltronas', function(Blueprint $table)
		{
			//FK para compra (poltrona que esta relacionada a compra x)
			$table->increments('id');
			$table->timestamps();
			$table->foreign('compra_id')
				->references('id')
				->on('compras_clickbus')
				->onDelete('cascade');

			$table->string('bus_company')->nullable();
			$table->string('seat_number')->nullable();
			$table->string('passenger_name')->nullable();
			$table->string('passenger_document_type')->nullable();
			$table->string('passenger_document_number')->nullable();
			$table->string('passenger_email')->nullable();
			$table->string('departure_waypoint_id')->nullable();
			$table->string('arrival_waypoint_id')->nullable();
			$table->date('departure_time')->nullable();
			$table->date('arrival_time')->nullable();

			$table->string('subtotal')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compras_clickbus_poltronas');
	}

}
