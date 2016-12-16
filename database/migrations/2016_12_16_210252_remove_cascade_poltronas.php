<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCascadePoltronas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('compras_clickbus_poltronas', function(Blueprint $table)
        {
            /**
             * Dropando FK's que possuiam ONDELETE CASCADE
             */
            $table->dropForeign('compras_clickbus_poltronas_departure_id_foreign');
            $table->dropForeign('compras_clickbus_poltronas_arrival_id_foreign');
            $table->dropForeign('compras_clickbus_poltronas_viacao_id_foreign');


            /**
             * Recriando FK's sem o ONDELETE CASCADE
             */

            $table->foreign('departure_id')
                ->references('id')
                ->on('ClickBusPlaces');

            $table->foreign('arrival_id')
                ->references('id')
                ->on('ClickBusPlaces');

            $table->foreign('viacao_id')
                ->references('id')
                ->on('ClickBusCompanies');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('compras_clickbus_poltronas', function(Blueprint $table)
		{
            /**
             * Dropando novas FK's que estao sem ONDELETE CASCADE
             */
            $table->dropForeign('compras_clickbus_poltronas_departure_id_foreign');
            $table->dropForeign('compras_clickbus_poltronas_arrival_id_foreign');
            $table->dropForeign('compras_clickbus_poltronas_viacao_id_foreign');


            /**
             * Recriando FK's com o ONDELETE CASCADE
             */

            $table->foreign('departure_id')
                ->references('id')
                ->on('ClickBusPlaces')
                ->onDelete('cascade');

            $table->foreign('arrival_id')
                ->references('id')
                ->on('ClickBusPlaces')
                ->onDelete('cascade');

            $table->foreign('viacao_id')
                ->references('id')
                ->on('ClickBusCompanies')
                ->onDelete('cascade');
		});
	}

}
