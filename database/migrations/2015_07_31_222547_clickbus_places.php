<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClickbusPlaces extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clickbus_places', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('item_id')->nullable();
			$table->integer('station_id')->nullable();
			$table->string('slug');
			$table->string('locale')->nullable();
			$table->string('is_primary')->nullable();
			$table->string('item_created_at')->nullable();
			$table->string('place_created_at')->nullable();
			$table->string('item_updated_at')->nullable();
			$table->string('place_updated_at')->nullable();
			$table->integer('place_id');
			$table->string('place_name')->nullable();
			$table->string('state_code')->nullable();
			$table->string('state_name')->nullable();
		});
		
		if (strcasecmp(env('DB_DRIVER'), 'pgsql') == 0) {
			DB::statement('ALTER TABLE clickbus_places ADD COLUMN place_position geometry(Point,4326) NULL;');
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clickbus_places');
	}

}
