<?php

class Role extends Eloquent {
    protected $table = 'roles';
    protected $hidden = array('id');

    public function User() {
        return $this->belongsTo('User');
    }
}