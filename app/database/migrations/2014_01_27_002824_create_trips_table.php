<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Trips', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->timestamp('depart');
			$table->timestamp('arrive');
			$table->string('connection');
			$table->timestamp('duration');
			$table->integer('train_id')->unsigned();
			$table->timestamps();
			$table->foreign('train_id')
			      ->references('id')
			      ->on('trains')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Trips');
	}

}
