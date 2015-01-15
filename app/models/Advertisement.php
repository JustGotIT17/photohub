<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 2:15 PM
 */

class Advertisement extends Eloquent {
    protected $table = 'advertisement';
    protected $hidden = array('id');
    protected $guarded = array('id');
} 