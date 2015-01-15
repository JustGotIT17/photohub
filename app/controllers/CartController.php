<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 10/26/2014
 * Time: 12:37 PM
 */

class CartController extends BaseController {

    public function add($id) {
        $item = Item::where('id', 'LIKE', '%'.$id.'%')->where('branch_id', 0)->orWhere('branch_id', Auth::user()->branch_id)->first();
        if($item)
            Cart::instance('shopping')->add($item->id, $item->name, 1, $item->costPrice);
        //$cartItems = Cart::instance('shopping')->content();

        return Redirect::back();
    }

    public function edit($id) {
        $in = Input::all();
        foreach($in as $ID => $val) {
            Cart::instance('shopping')->update($ID, array('qty' => $val));
        }
        return Redirect::back();
    }

    public function remove($id) {
        if (count(Cart::instance('shopping')->get($id)))
            Cart::instance('shopping')->remove($id);
        return Redirect::back();
    }

    public function checkout() {

        $in = Input::all();

        $cartItems = Cart::instance('shopping')->content();
        $branch = Branch::find(Auth::user()->branch_id);
        $cartTotal =  Cart::instance('shopping')->total();
        $cartNoOfItems =  Cart::instance('shopping')->count(false);
        $cash = $in['cash'];
        $change = $in['change'];
        if(Credit::getCreditAmount(Auth::user()->branch_id) >= $cartTotal) {
            //deduct the Total amount to the System Credits
            Credit::deductCreditAmount(Auth::user()->branch_id, $cartTotal);
            //create transID
            $transID = TransactionGroup::getTransID();
            //add items to the transactions table
            TransactionGroup::create([
                'transaction_id'=>$transID,
                'user_id'=>Auth::user()->id,
                'branch_id'=>Auth::user()->branch_id,
                'totalAmount'=>$cartTotal,
                'cash'=>$in['cash'],
                'change'=>$in['change']
            ]);
            Transaction::add($cartItems, $transID);
            return View::make('admin.sales.checkout', compact('cartItems', 'branch', 'cartTotal', 'cartNoOfItems', 'cash', 'change', 'transID'));

        } else
            return View::make('error.system_credit');
  }

    public function destroy() {
        Cart::instance('shopping')->destroy();
        return Redirect::back();
    }
}