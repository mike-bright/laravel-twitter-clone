<?php

class Settings extends Eloquent {
	public function user()
	{
		return $this->belongsTo('user', 'userId');
	}
}