<?php

use Alsaudi\Eloquent\UserRelation;

class User extends UserRelation {

	public $fillable =array('user_name','first_name','last_name','password','email');
}