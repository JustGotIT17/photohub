<?php
class ItemController extends BaseController
{

    public function index()
    {
        $Items = Item::paginate(25);
        $cat = [];
        $sup = [];
        $branch = ['0'=>'All'];
        foreach(Category::all() as $eCat)
            $cat[$eCat->id] = $eCat->name;

        foreach(Supplier::all() as $eSup)
            $sup[$eSup->id] = $eSup->companyName;
        foreach(Branch::all() as $b)
            $branch[$b->id] = $b->name;

        return View::make('admin.item.items', compact('Items', 'cat', 'sup', 'branch'));
    }
    public function add() {
        $in = Input::all();
        $rules = [
            'code'=>'required',
            'name'=>'required',
            'catID'=>'required',
            'supID'=>'required',
            'costPrice'=>'required',
            'qty'=>'required',
            'reorder'=>'required',
            'loc'=>'',
            'descr'=>'',
            'branchID'=>'required'
        ];

        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        Item::create([
            'code'=>$in['code'],
            'name'=>$in['name'],
            'category_id'=>$in['catID'],
            'supplier_id'=>$in['supID'],
            'costPrice'=>$in['costPrice'],
            'quantity'=>$in['qty'],
            'reorderLevel'=>$in['reorder'],
            'location'=>$in['loc'],
            'description'=>$in['descr'],
            'branch_id'=>$in['branchID']
        ]);
        return Redirect::to('/items')->with('success', 'Item has been successfully added.');
    }
    public function edit($id) {
        $items = Item::find($id);
        $cat = [];
        $sup = [];
        $branch = ['0'=>'All'];
        foreach(Category::all() as $eCat)
            $cat[$eCat->id] = $eCat->name;

        foreach(Supplier::all() as $eSup)
            $sup[$eSup->id] = $eSup->companyName;
        foreach(Branch::all() as $b)
            $branch[$b->id] = $b->name;

        return View::make('admin.item.edit', compact('items', 'cat', 'sup', 'branch'));
    }

    public function save($id) {
        $in = Input::all();
        $rules = [
            'name'=>'required',
            'catID'=>'required',
            'supID'=>'required',
            'costPrice'=>'required',
            'qty'=>'required',
            'reorder'=>'required',
            'loc'=>'',
            'descr'=>'',
            'branchID'=>'required'
        ];

        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        $item = Item::find($id);
        $item->name = $in['name'];
        $item->category_id = $in['catID'];
        $item->supplier_id = $in['supID'];
        $item->costPrice = $in['costPrice'];
        $item->quantity = $in['qty'];
        $item->reorderLevel = $in['reorder'];
        $item->location = $in['loc'];
        $item->description = $in['descr'];
        $item->branch_id = $in['branchID'];
        $item->save();
        return Redirect::back();
    }
    public function remove($id) {
        Item::find($id)->delete();
        return Redirect::back()->with('success', 'Item has been successfully deleted.');
    }


}
