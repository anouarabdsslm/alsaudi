<?php namespace Alsaudi\Eloquent;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;

class UserRelation extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}
	/**
	 * Get the username for the user.
	 *
	 * @return string
	 */
	public function getAuthUsername()
	{
		return $this->user_name;
	}
	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	* 	The table users relationships.
	* 	@var string
	*/

	//one user has one credit card (one credit card belongs to one user only)
	public function creditcard(){
		return $this->hasOne('Alsaudi\\Eloquent\\CreditcardRelation');
	}

	//one user has one ticket (one ticket belongs to one user)
	public function ticket(){
		
		return $this->hasMany('Alsaudi\\Eloquent\\TicketRelation');
	}

	//one user belongs to one trip(that include his/her destination)(one trip has many passengers)
	public function trip(){
		return $this->belongsToMany('Alsaudi\\Eloquent\\StationRelation',
			'trip_user','trip_id','user_id');
	}





}