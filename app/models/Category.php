<?php

class Category extends Eloquent {

    protected $table = 'category';
    protected $guarded = array('id');

    public function Items() {
        return $this->hasMany('Item');
    }
}