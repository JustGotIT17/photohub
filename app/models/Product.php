<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 2:11 PM
 */

class Product extends Eloquent {
    protected $table = 'products';
    protected $hidden = array('id');
    protected $guarded = array('id');

    public function Category() {
        return $this->belongsTo('ProductCategory');
    }
} 