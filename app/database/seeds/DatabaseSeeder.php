<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('TrainsTableSeeder');
		$this->call('StationsTableSeeder');
		$this->call('TripsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('CreditcardsTableSeeder');
		$this->call('TicketsTableSeeder');
		$this->call('StationTripTableSeeder');
		$this->call('TripUserTableSeeder');
	}

}