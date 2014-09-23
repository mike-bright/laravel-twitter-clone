<?php

class Image extends Eloquent {

	// use UserTrait, RemindableTrait;
	protected $table = 'image';

    protected $guarded = array('id');

    public static function getBlankImage()
    {
    	$images = Image::where('url', '=', '')->get();
    	return $images[0];
    }
}
