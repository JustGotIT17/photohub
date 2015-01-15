<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/18/2014
 * Time: 9:36 PM
 */

class Gallery extends Eloquent {
    protected $table = 'gallery';
    protected $hidden = array('id');
    protected $guarded = array('id');

    public function album() {
        return $this->belongsTo('Album');
    }
} 