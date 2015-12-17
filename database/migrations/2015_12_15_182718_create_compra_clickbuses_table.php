<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraClickbusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compra_clickbuses', function(Blueprint $table)
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
                        
                        $table->string('payment_method')->nullable();
                        $table->string('total')->nullable();
                        $table->string('currency')->nullable();
                        $table->string('quantidade_passagens')->nullable();

                        //campos para controle das passagens de ida 
			$table->string('ida_quantidade')->nullable();
			$table->string('ida_trip_id')->nullable();
			$table->string('ida_trip_localizers')->nullable();
			$table->string('ida_departure_waypoint_id')->nullable();
			$table->string('ida_arrival_waypoint_id')->nullable();
			$table->string('ida_trip_date')->nullable();
        
                        //campos para controle das passagens de volta
			$table->string('volta_quantidade')->nullable();
			$table->string('volta_trip_id')->nullable();
			$table->string('volta_trip_localizers')->nullable();
			$table->string('volta_departure_waypoint_id')->nullable();
			$table->string('volta_arrival_waypoint_id')->nullable();
			$table->string('volta_trip_date')->nullable();
                        
                        
                        $table->boolean('pagamento_confirmado')->default(false);
                });
        }


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compra_clickbuses');
	}

}
