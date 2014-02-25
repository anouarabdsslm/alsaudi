<?php

class StationsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('stations')->delete();

		$stations = array(
			array('id'=>1,'station_dep'=>'casa','station_arr'=>'tanger','miles'=>'400'),
			array('id'=>2,'station_dep'=>'Knitra','station_arr'=>'casa','miles'=>'200'),
			array('id'=>3,'station_dep'=>'Rabat','station_arr'=>'fes','miles'=>'200'),
			array('id'=>4,'station_dep'=>'marrakesh','station_arr'=>'casa','miles'=>'200'),

		);

		// Uncomment the below to run the seeder
		DB::table('stations')->insert($stations);
	}

}