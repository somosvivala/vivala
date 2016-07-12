<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasClickbusPoltronasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('compras_clickbus_poltronas', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            //fk para compra, toda poltrona pertence a 1 compra
            $table->integer('compra_id')->nullable();
            $table->foreign('compra_id')
                ->references('id')
                ->on('compras_clickbus');

            //fk para id em clickbusplaces, esse id é o nosso
            //id interno, nao o waypoint_id da clickbus
            $table->integer('departure_id')->nullable();
            $table->foreign('departure_id')
                ->references('id')
                ->on('ClickBusPlaces');

            //fk para id em clickbusplaces, esse id é o nosso
            //id interno, nao o waypoint_id da clickbus
            $table->integer('arrival_id')->nullable();
            $table->foreign('arrival_id')
                ->references('id')
                ->on('ClickBusPlaces');

            //fk para id em clickbuscompanies
            $table->integer('viacao_id')->nullable();
            $table->foreign('viacao_id')
                ->references('id')
                ->on('ClickBusCompanies');

            $table->string('localizer')->nullable();
            $table->string('passenger_name')->nullable();
            $table->string('passenger_document_number')->nullable();
            $table->string('passenger_document_type')->nullable();
            $table->string('seat_number')->nullable();
            $table->string('passenger_email')->nullable();
            $table->datetime('departure_time')->nullable();
            $table->datetime('arrival_time')->nullable();
            $table->string('subtotal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('compras_clickbus_poltronas');
    }
}
