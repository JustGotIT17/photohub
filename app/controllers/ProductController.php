<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 3:07 PM
 */

class ProductController extends BaseController {

    public function index() {
        $category = [];
        foreach(ProductCategory::all() as $cat)
            $category[$cat->id] = $cat->name;
        $featured = ['0'=>'No', '1'=>'Yes'];
        $products = Product::with('Category')->get();

        return View::make('admin.product.index', compact('category', 'featured','products'));
    }

    public function create() {
        $in = Input::all();
        $files = Input::file('files');
        $rules1 = array(
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        );
        $validation1 = Validator::make($in, $rules1);
        if ($validation1->passes()) {
            foreach ($files as $file) {
                $rules = array(
                    'file' => 'required|mimes:png,jpeg|max:20000'
                );

                $validation = Validator::make(array('file' => $file), $rules);
                if ($validation->passes()) {
                    $id = Str::random(14);
                    $destinationPath = 'uploads/products/';
                    $filename = $in['category'] . '-' . $id . $file->getClientOriginalName();
                    $mime_type = $file->getMimeType();
                    $extension = $file->getClientOriginalExtension();
                    $upload_success = $file->move('public/' . $destinationPath, $filename);
                    if ($upload_success) {
                        Product::create([
                            'name' => (strlen($in['name']) > 0) ? $in['name'] : 'no_name',
                            'description' => $in['description'],
                            'price' => $in['price'],
                            'product_category_id' => $in['category'],
                            'image' => $destinationPath . $filename,
                            'featured_id'=>$in['featured'],
                        ]);
                    }
                } else {
                    return Redirect::back()->withErrors($validation)->withInput(Input::all());
                }
            }
            return Redirect::back();
        } else {
            return Redirect::back()->withErrors($validation1)->withInput(Input::all());
        }
    }


} 