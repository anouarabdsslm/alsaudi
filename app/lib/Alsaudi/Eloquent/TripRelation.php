<?php namespace Alsaudi\Eloquent;
use Eloquent;
class TripRelation extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'trips';
	protected $guarded = array();
	protected $dates = array('depart','arrive');
	public static $rules = array();
	/**
	* 	The table trips relationships.
	* 	@var string
	*/

	//one trip has many users
	public function users(){
		return $this->belongsToMany('Alsaudi\\Eloquent\\UserRelation',
			'trip_user','trip_id','user_id');
	}

	//one trip has Many ticket(one ticket belongs to one trip)
	public function tickets(){
		return $this->hasMany('Alsaudi\\Eloquent\\TicketRelation','trip_id');
	}

	//one trip belongs to one train
	public function train(){
		
		return $this->belongsTo('Alsaudi\\Eloquent\\TrainRelation');
	}

	//one trip has many stations or destinations (casa-tanger)->(rabat station,knitra station,assila station ,tanger stations)
	public function stations(){
		
		return $this->belongsToMany('Alsaudi\\Eloquent\\StationRelation',
			'station_trip','trip_id','station_id');
	}
}