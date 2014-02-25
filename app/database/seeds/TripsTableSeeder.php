<?php

class TripsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('trips')->delete();

		$trips = array(
			//casa ->tanger
			array('id'=>1,'depart'=>\Carbon\Carbon::today()->format('Y-m-d')." "."09:00",
				'arrive'=>\Carbon\Carbon::today()->format('Y-m-d')." "."15:00",'connection'=>'direct',
				'duration'=>date('H:i:s'),'train_id'=>1),
			//Knitra -> casa
			array('id'=>2,'depart'=>\Carbon\Carbon::today()->format('Y-m-d')." "."10:00",
				'arrive'=>\Carbon\Carbon::today()->format('Y-m-d')." "."12:00",'connection'=>'direct',
				'duration'=>date('H:i:s'),'train_id'=>2),
			//Rabat ->fes
			array('id'=>3,'depart'=>\Carbon\Carbon::today()->format('Y-m-d')." "."09:00",
				'arrive'=>\Carbon\Carbon::today()->format('Y-m-d')." "."15:00",'connection'=>'direct',
				'duration'=>date('H:i:s'),'train_id'=>3),
			//marakesh -> casa
			array('id'=>4,'depart'=>\Carbon\Carbon::today()->format('Y-m-d')." "."10:00",
				'arrive'=>\Carbon\Carbon::today()->format('Y-m-d')." "."12:00",'connection'=>'direct',
				'duration'=>date('H:i:s'),'train_id'=>4),

		);

		// Uncomment the below to run the seeder
		DB::table('trips')->insert($trips);
	}

}