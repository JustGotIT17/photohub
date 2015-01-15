<?php

class TransactionGroup extends Eloquent {

    protected $table = 'transactiongroups';
    protected $guarded = array('id');

    public function branch() {
        return $this->belongsTo('Branch', 'branch_id');
    }
    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

    public function Transaction() {
        return $this->hasMany('Transaction', 'transaction_id');
    }
    public static function getTransID() {
        $count = TransactionGroup::all()->count() + 1;
        $x = strlen(utf8_decode($count));
        if($x == 1)
            return date('mdY-0000').($count);
        elseif ($x == 2)
            return date('mdY-000').($count);
        elseif ($x == 3)
            return date('mdY-00').($count);
        elseif($x == 4)
            return date('mdY-0').($count);
        else
            return date('mdY-').($count);

    }

}