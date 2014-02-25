<?php

class CreditcardsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('creditcards')->delete();

		$creditcards = array(
			array('id'=>1,'card_number'=>1111111111115,'date_exp'=>date('Y m d H:i:s'),
				'cvv'=>'142','user_id'=>1),

			array('id'=>2,'card_number'=>4444455555555,'date_exp'=>date('Y m d H:i:s'),
				'cvv'=>'142','user_id'=>2),
		);

		// Uncomment the below to run the seeder
		DB::table('creditcards')->insert($creditcards);
	}

}