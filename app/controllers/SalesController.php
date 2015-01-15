<?php

class SalesController extends BaseController {
    public function index() {
        $sales = TransactionGroup::where('branch_id', '=', Auth::user()->branch_id)->orderBy('updated_at', 'DESC')->paginate(25);
        return View::make('admin.sales.index', compact('sales'));
    }

    public function add() {
        Cart::instance('shopping');
        $cartItems = Cart::instance('shopping')->content();
        $cartTotal =  Cart::instance('shopping')->total();
        $cartNoOfItems =  Cart::instance('shopping')->count(false);

        if (Auth::guest())
            return View::make('admin.login');
        elseif (Credit::getCreditAmount(Auth::user()->branch_id) <= 0 || $cartTotal > Credit::getCreditAmount(Auth::user()->branch_id)) {
            return View::make('error.system_credit');
        }

        return View::make('admin.sales.add', compact('cartItems', 'cartTotal', 'cartNoOfItems'));
    }

    public function search() {
        $in = Input::all();
        $id = $in['itemID'];
        //$items = Item::where('code', 'LIKE', '%'.$id.'%')->where('branch_id', 0)->orWhere('branch_id', Auth::user()->branch_id)->get();
        $items = Item::where('code', 'LIKE', '%'.$id.'%')->get();
        return View::make('admin.sales.search', compact('items'));
    }

    public function searchAll() {
        $items = Item::where('branch_id', 0)->orWhere('branch_id', Auth::user()->branch_id)->get();
        return View::make('admin.sales.search', compact('items'));
    }

    public function view($id) {
        $cartItems = Transaction::where('transaction_id', '=', $id)->get();
        $cartInfo = TransactionGroup::where('transaction_id', '=', $id)->first();
        $branch = Branch::find($cartInfo->branch_id);
        return View::make('admin.sales.view', compact('cartItems', 'cartInfo', 'branch'));
    }

    public function branch($id) {
        $items = TransactionGroup::where('branch_id', $id)->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->orderBy('created_at', 'DESC')->paginate(25);
        return View::make('admin.branch.sales', compact('items', 'id'));
    }
    public function all($id) {
        $items = TransactionGroup::where('branch_id', $id)->orderBy('created_at', 'DESC')->paginate(25);
        return View::make('admin.branch.sales', compact('items', 'id'));
    }

}