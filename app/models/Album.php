<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/18/2014
 * Time: 9:37 PM
 */

class Album extends Eloquent {
    protected $table = 'album';
    protected $hidden = array('id');
    protected $guarded = array('id');

    public function gallery() {
        return $this->hasMany('Gallery');
    }
} 