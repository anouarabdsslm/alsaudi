<?php

use Alsaudi\Eloquent\TripRelation;
class Trip extends TripRelation {
	protected $guarded = array();

	public static $rules = array();

	public function getDates() {

		return array('craeted_at','updated_at',
			'depart','arrive','duration');
	}
}
