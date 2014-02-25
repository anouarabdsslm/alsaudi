<?php namespace Alsaudi\Eloquent;
use Eloquent;
class StationRelation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stations';
	protected $guarded = array();

	public static $rules = array();


	//one station belongs to many trips
	public function trip(){
		
		return $this->belongsToMany('Alsaudi\\Eloquent\\TripRelation',
			'station_trip','station_id','trip_id');
	}

	//one station belongs to many trains
	public function train(){
		
		return $this->belongsToMany('Alsaudi\\Eloquent\\TrainRelation');
	}
}