<?php namespace Alsaudi\Eloquent;
use Eloquent;
class TrainRelation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'trains';
	protected $guarded = array();

	public static $rules = array();

	/**
	* 	The table train relationship.
	* 	@var string
	*/

	//one train has Many  trips
	public function trips(){
		return $this->hasMany('Alsaudi\\Eloquent\\TripRelation','train_id');
	}

	//one train has many stations
	public function stations(){
		return $this->belongsToMany('Alsaudi\\Eloquent\\StationRelation');
	}


}