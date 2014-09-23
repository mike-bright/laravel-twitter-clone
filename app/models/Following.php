<?php

class Following extends Eloquent {

	// use UserTrait, RemindableTrait;
	protected $table = 'following';

    protected $guarded = array('id');

    public function scopeFollowing($query, $userId)
    {
    	return $query->where('followingUserId', '=', $userId);
    }

    public function scopeFollower($query, $userId)
    {
    	return $query->where('userId', '=', $userId);
    }
}
