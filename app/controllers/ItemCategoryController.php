<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 1/14/2015
 * Time: 8:17 PM
 */

class ItemCategoryController extends BaseController {

    public function index(){
        $categories = Category::paginate(25);
        return View::make('admin.item.category.view', compact('categories'));
    }

    public function add(){
        $in = Input::all();
        $rules = [
            'name'=>'required|min:1',
            'description'=>'required|min:1'
        ];
        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());
        Category::create([
            'name'=>$in['name'],
            'description'=>$in['description']
        ]);

        return Redirect::back()->with('success', 'New category item successfully created.');
    }

    public function edit($id) {
        $category = Category::find($id);
        if(count($category))
            return View::make('admin.item.category.edit', compact('category'));
        else
            return Redirect::back();
    }

    public function update($id) {
        $category = Category::find($id);
        $in = Input::all();
        $rules = [
            'name'=>'required|min:1',
            'description'=>'required|min:1'
        ];
        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        $category->name = $in['name'];
        $category->description = $in['description'];
        if($category->save())
            return Redirect::to('/items/category/')->with('success', 'Successfully updated.');
        else
            return Redirect::back()->with('success', 'Error: Not successfully updated.')->withInput(Input::all());
    }

    public function remove($id) {
        if(Category::find($id)->delete())
            return Redirect::back()->with('success', 'Successfully deleted');
        else
            return Redirect::back()->with('success', 'Error: No such category found.');
    }
} 