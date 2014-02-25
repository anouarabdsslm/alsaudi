<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotStationTripTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('station_trip', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('station_id')->unsigned()->index();
			$table->integer('trip_id')->unsigned()->index();
			$table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
			$table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('station_trip');
	}

}
