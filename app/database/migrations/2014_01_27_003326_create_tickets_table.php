<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tickets', function(Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('code');
			$table->integer('user_id')->unsigned();
			$table->integer('trip_id')->unsigned();
			$table->timestamps();
			$table->foreign('user_id')
			      ->references('id')
			      ->on('users')
			      ->onDelete('cascade')
			      ->onUpdate('cascade');

			$table->foreign('trip_id')
			      ->references('id')
			      ->on('trips')
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
		Schema::drop('Tickets');
	}

}
