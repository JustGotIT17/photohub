<?php

class ReportController extends BaseController {
    public function index() {
        return View::make('admin.reports.sales');
    }

    public function option() {
        $today = date('Y-m-d');
        switch(Input::get('option')) {
            case "1":
                $date = date('Y-m-d');
                $report = TransactionGroup::with('user')->where('branch_id', Auth::user()->branch_id)->where('created_at', 'LIKE', '%'. $date.'%')->get();
                break;
            case "2":
                $date = date('Y-m-d', strtotime($today. "-1 days"));
                $report = TransactionGroup::with('user')->where('branch_id', Auth::user()->branch_id)->where('created_at', 'LIKE', '%'. $date.'%')->get();
                break;
            case "3":
                $from = date('Y-m-d', strtotime($today. "-8 days"));
                $to = date('Y-m-d', strtotime($today . "+1 days"));
                $date = "From: " . date('Y-m-d', strtotime($today. "-7 days")) . " To: " . $today;
                $report = TransactionGroup::with('user')->whereBetween('created_at', [$from, $to])->where('branch_id', Auth::user()->branch_id)->get();
                break;
            case "4":
                $from = date('Y-m-d', strtotime($today. "-32 days"));
                $to = date('Y-m-d', strtotime($today . "+1 days"));
                $date = "From: " . date('Y-m-d', strtotime($today. "-31 days")) . " To: " . $today;
                $report = TransactionGroup::with('user')->whereBetween('created_at', [$from, $to])->where('branch_id', Auth::user()->branch_id)->get();
                break;
            case "5":
                $from = date('Y-m-d', strtotime($today. "-366 days"));
                $to = date('Y-m-d', strtotime($today . "+1 days"));
                $date = "From: " . date('Y-m-d', strtotime($today. "-365 days")) . " To: " . $today;
                $report = TransactionGroup::with('user')->whereBetween('created_at', [$from, $to])->where('branch_id', Auth::user()->branch_id)->get();
                break;
            case "6":
                $date = "All Transactions";
                $report = TransactionGroup::with('user')->where('branch_id', Auth::user()->branch_id)->get();
                break;
        }
        $branch = Branch::findOrFail(Auth::user()->branch_id);
        return View::make('admin.reports.basic', compact('report', 'date', 'branch'));
    }

    public function view() {
        $in = Input::all();

        $rules = [
            'dateFrom' => 'required',
            'dateTo' => 'required',
        ];

        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        $from = date('Y-m-d', strtotime($in['dateFrom']. "-1 days"));
        $to = date('Y-m-d', strtotime($in['dateTo'] . "+1 days"));

        $branch = Branch::findOrFail(Auth::user()->branch_id);
        $report = TransactionGroup::with('user')->whereBetween('created_at', [$from, $to])->where('branch_id', Auth::user()->branch_id)->get();
        //return $report;
        return View::make('admin.reports.view', compact('report', 'branch', 'from', 'to'));
    }
} 