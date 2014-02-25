<?php

class TrainsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('trains')->delete();

		$trains = array(
			array('id' =>1 	, 'train_name'=>'6436'),
			array('id' =>2	, 'train_name'=>'6546'),
			array('id' =>3	, 'train_name'=>'GHJ9'),
			array('id' =>4	, 'train_name'=>'HG85'),
		);

		// Uncomment the below to run the seeder
		DB::table('trains')->insert($trains);
	}

}
