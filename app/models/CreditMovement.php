<?php

class CreditMovement extends Eloquent {
    protected $table = 'creditmovement';
    protected $guarded = array('id');

    public function branch() {
        return $this->belongsTo('Branch', 'branch_id');
    }

    public static function add($branch, $amount) {
        CreditMovement::create([
            'amount' => $amount,
            'branch_id' => $branch
        ]);
    }
} 