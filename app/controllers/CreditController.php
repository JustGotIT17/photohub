<?php

class CreditController extends BaseController {

    public function index() {
        $credits = CreditMovement::with('branch')->orderBy('created_at', 'DESC')->paginate(25);
        $branchList = [];
        foreach (Branch::all() as $eBranch)
            $branchList[$eBranch->id] = $eBranch->name;
        return View::make('admin.credit.index', compact('credits', 'branchList'));
    }
    public function add() {
        $in = Input::all();

        $rules = [
            'amount'=>'required|numeric|min:1',
        ];

        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());


        $currentCredit = Credit::getCreditAmount($in['branch_id']);
        $newCredit = $currentCredit + $in['amount'];
        $credit = Credit::findOrFail($in['branch_id']);
        $credit->amount = $newCredit;
        $credit->save();
        CreditMovement::add($in['branch_id'], $in['amount']);
        return Redirect::back();
    }
}