<?php

class Repost extends Eloquent {

    protected $table = 'repost';

    protected $guarded = array('id');

    public function post()
    {
        return $this->belongsTo('Post', 'postId');
    }

    public function source()
    {
        return $this->belongsTo('Post', 'sourcePostId');
    }

}
