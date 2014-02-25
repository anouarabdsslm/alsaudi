<?php namespace Alsaudi\Eloquent;
use Eloquent;
class TicketRelation extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tickets';
	protected $guarded = array();

	public static $rules = array();

	/**
	* 	The table tickets relationships.
	* 	@var string
	*/

	//one ticket belongs to one user
	public function user(){
		return $this->belongsTo('Alsaudi\\Eloquent\\UserRelation','user_id');
	}

	//one ticket belongs to one trip(one trip has Many ticket)
	public function trip(){
		return $this->belongsTo('Alsaudi\\Eloquent\\TripRelation');
	}
}