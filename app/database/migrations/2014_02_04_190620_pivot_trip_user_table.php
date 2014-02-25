<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotTripUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('trip_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_user');
	}

}
