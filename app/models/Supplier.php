<?php

class Supplier extends Eloquent {
    protected $table = 'suppliers';
    protected $hidden = array('id');

    public function Items() {
        return $this->hasMany('Item');
    }
}