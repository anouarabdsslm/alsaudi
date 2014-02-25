<?php namespace Alsaudi\Eloquent;
use Eloquent;
class CreditcardRelation extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'creditcards';
	
	protected $guarded = array();

	public static $rules = array();

	public function user(){
		return $this->belongsTo('Alsaudi\\Eloquent\\UserRelation','user_id');
	}
}
