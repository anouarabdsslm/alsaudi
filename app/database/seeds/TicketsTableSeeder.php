<?php

class TicketsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('tickets')->delete();

		$tickets = array(
			array('id'=>1,'code'=>'GHKHKH14521444','user_id'=>1,'trip_id'=>1),
			array('id'=>2,'code'=>'GLLHLREG144521','user_id'=>2,'trip_id'=>2),
		);

		// Uncomment the below to run the seeder
		DB::table('tickets')->insert($tickets);
	}

}