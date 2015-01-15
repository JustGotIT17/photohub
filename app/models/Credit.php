<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 10/29/2014
 * Time: 1:12 PM
 */

class Credit extends Eloquent {
    protected $table = 'credits';
    protected $guarded = array('id');

    public function branch() {
        return $this->belongsTo('Branch');
    }
    public static function getCreditAmount($id) {
        $credit = Credit::where('branch_id', '=', $id)->firstOrFail();
        return $credit->amount;
    }

    public static function deductCreditAmount($id, $val) {
        $credit = Credit::where('branch_id', '=', $id)->firstOrFail();
        $amount = $credit->amount;
        if($amount >= $val) {
            $credit->amount = $amount - $val;
            $credit->save();
        } else
            return Redirect::back()->withErrors('error', 'Insufficient credits.');
    }
}