<?php

class Item extends Eloquent {

    protected $table = 'items';
    protected $guarded = array('id');


    public static function getItemName($id) {
        $i = Item::find($id);
        return $i->name;
    }

    public function Supplier() {
        return $this->belongsTo('Supplier');
    }

    public function Category() {
        return $this->belongsTo('Category');
    }

    public function Transaction() {
        return $this->hasMany('Transaction');
    }
}