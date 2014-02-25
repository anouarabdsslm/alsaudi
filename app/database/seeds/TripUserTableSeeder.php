<?php

class TripUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('trip_user')->delete();

		$tripUser = array(
			//casa ===> tanger
			array('id'=>1,'user_id'=>1,'trip_id'=>1),

			//knitra ===> casa
			array('id'=>2,'user_id'=>2,'trip_id'=>2),

		);

		// Uncomment the below to run the seeder
		DB::table('trip_user')->insert($tripUser);
	}

}