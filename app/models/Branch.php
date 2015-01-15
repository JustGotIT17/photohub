<?php
 class Branch extends Eloquent {
     protected $table = 'branches';
     protected $hidden = array('id');
     protected $guarded = array('id');

    public function TransactionGroup() {
        return $this->hasMany('TransactionGroup');
    }

    public function Credit() {
        return $this->hasOne('Credit');
    }

    public function creditMovement() {
        return $this->hasMany('CreditMovement', 'id');
    }
    public function users() {
        return $this->hasMany('User', 'user_id');
    }
 }