<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 2:12 PM
 */

class ProductCategory extends Eloquent {
    protected $table = 'product_category';
    protected $hidden = array('id');
    protected $guarded = array('id');

    public function Product() {
        $this->hasMany('Product');
    }
} 