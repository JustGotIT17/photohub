<?php

class BranchController extends BaseController {


    public function index() {
        $branch = Branch::paginate(25);
        return View::make('admin.branch.index', compact('branch'));
    }

    public function add() {
        $in = Input::all();

        $rules = [
            'name'=>'required',
            'address'=>'required',
            'tin'=>'required',
            'contact'=>'required',
            'amount'=>'required|numeric|min:1',
        ];
        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        Branch::create([
            'name'=>$in['name'],
            'address'=>$in['address'],
            'TIN'=>$in['tin'],
            'contact'=>$in['contact'],
        ]);

        $last = Branch::all()->last();
        //return $last->id;
        Credit::create([
            'amount'=>$in['amount'],
            'branch_id'=>$last->id,
        ]);
        return Redirect::to('/branches')->with('success', 'The new branch has been successfully added.');

    }

    public function edit($id) {
        if(Auth::user()->role_id != '1')
            $id = Auth::user()->branch_id;
        $branch = Branch::find($id);
        return View::make('admin.branch.edit', compact('branch'));
    }

    public function save($id){
        if(Auth::user()->role_id != '1')
            $id = Auth::user()->branch_id;

        $in = Input::all();
        $rules = [
            'name'=>'required',
            'address'=>'required',
            'tin'=>'required',
            'contact'=>'required',
        ];

        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());
        $branch = Branch::find($id);

        $branch->name = $in['name'];
        $branch->address = $in['address'];
        $branch->TIN = $in['tin'];
        $branch->contact = $in['contact'];
        $branch->save();
        return Redirect::back()->with('success', 'Successfully updated!');
    }
    public function remove($id) {
        Branch::find($id)->delete();
        return Redirect::back();
    }

}