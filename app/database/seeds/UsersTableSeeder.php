<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->delete();

		$users = array(
			array('id'=>1,'user_name'=>'anouar','first_name'=>'Anouar',
				'last_name'=>'Abdessalam','user_name'=>'root',
				'email'=>'test@gmail.com','password'=>Hash::make('root'),'is_admin'=>0),

			array('id'=>2,'user_name'=>'bilal','first_name'=>'Bilal',
				'last_name'=>'Ararou','user_name'=>'rootme',
				'email'=>'test1@gmail.com','password'=>Hash::make('rootme'),'is_admin'=>1),
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}