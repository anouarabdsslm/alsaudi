<?php

class StationTripTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('station_trip')->delete();

		$trips = array(
			//casa ===> tanger
			array('id'=>1,'station_id'=>1,'trip_id'=>1),

			//knitra ===> casa
			array('id'=>2,'station_id'=>2,'trip_id'=>2),

			//rabat ===> fes
			array('id'=>3,'station_id'=>3,'trip_id'=>3),

			//marrakesh ===> casa
			array('id'=>4,'station_id'=>4,'trip_id'=>4),

		);

		// Uncomment the below to run the seeder
		DB::table('station_trip')->insert($trips);
	}

}