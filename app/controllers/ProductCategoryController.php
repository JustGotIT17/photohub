<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 3:24 PM
 */

class ProductCategoryController extends BaseController {
    public function create() {
        $in = Input::all();


        if(strlen($in['name']) > 0) {
            ProductCategory::create([
                'name'=>$in['name'],
            ]);

        }
        return Redirect::back();
    }
} 