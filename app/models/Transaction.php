<?php

class Transaction extends Eloquent {
    protected $table = 'transactions';
    protected $guarded = array('id');

    public function TransactionGroup() {
        return $this->belongsTo('TransactionGroup', 'transaction_id');
    }

    public function Items() {
        return $this->belongsTo('Item', 'item_id');
    }

    public static function add($items, $transID) {
        foreach($items as $item) {
            Transaction::create([
                'transaction_id'=>$transID,
                'item_id'=>$item['id'],
                'qty'=>$item['qty'],
                'price'=>$item['price'],
                'user_id'=>Auth::user()->id,
                'branch_id'=>Auth::user()->branch_id
            ]);
        }
    }
}