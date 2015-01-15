<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $guarded = array('id');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password');

    public function Role() {
        return $this->hasOne('Role');
    }
    public function branch() {
        return $this->belongsTo('Branch', 'branch_id');
    }
    public function transactionGroup() {
        return $this->hasMany('TransactionGroup', 'transaction_id');
    }

    public static function getBranchName($id) {
        $branch = Branch::find($id);
        return $branch->name;
    }
    public static function getStatus($id) {
        $user = User::find($id);
        return $user->isOnline;
    }
    public static function changeStatus($id, $status) {
        $user = User::find($id);
        $user->isOnline= $status;
        $user->save();

    }
    public static function getRoleName($id) {
        $role = Role::find($id);
        return $role->name;
    }

    public static function getEmployeeName($id) {
        $user = User::find($id);
        return $user->firstName . ' ' . $user->lastName;
    }

    public function hasRole($roles) {
        if(Auth::check()){
            foreach(str_split($roles) as $id) {
                if (Auth::user()->role_id == $id)
                    return true;
                else
                    return false;
            }
        }

    }
}
