<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/26/2014
 * Time: 6:15 PM
 */

class Events extends Eloquent {
    protected $table = 'events';
    protected $hidden = array('id');
    protected $guarded = array('id');
} 