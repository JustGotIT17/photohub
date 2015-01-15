<?php

class DashboardController extends BaseController {

    public static function checkAuth() {
        if (Auth::user()->role_id == '2')
            return Redirect::to('/sales');
        elseif(Auth::user()->role_id == '3')
            return Redirect::to('/sales/add');
    }

    public static function getSales() {
        $sales = [];
        foreach(Branch::all() as $branch) {
            $count = $branch->TransactionGroup->count(); //total sales
            $today = TransactionGroup::where('branch_id', '=', $branch->id)->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->count();
            array_push($sales, ['id'=>$branch->id, 'name'=>$branch->name, 'todayCount'=>$today, 'totalCount'=>$count]);
        }
        return $sales;
    }

    public static function getBranches() {
        $branchList = [];
        foreach (Branch::all() as $eBranch)
            $branchList[$eBranch->id] = $eBranch->name;
        return $branchList;
    }

    public static function getCredits() {
        return Credit::with('branch')->orderBy('amount', 'ASC')->get();
    }

    public function index() {
        if(Auth::user()->role_id == '1') {
            $sales = DashboardController::getSales();
            $creditList = DashboardController::getCredits();
            return View::make('admin.home', compact('sales', 'creditList'));
        }
        else if (Auth::user()->role_id == '2')
            return Redirect::to('/sales');
        else if(Auth::user()->role_id == '3')
            return Redirect::to('/sales/add');
        else
            return Redirect::to('/');

    }

    public function home() {
        DashboardController::checkAuth();
        $sales = DashboardController::getSales();
        $creditList = DashboardController::getCredits();
        return View::make('admin.dashboard.index', compact('sales', 'creditList'));
    }
}