<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 9:31 PM
 */

class WebProductController extends BaseController {
    public function view($id) {
        $products = Product::whereProduct_category_id($id)->paginate(25);
        return View::make('web.product.view', compact('products'));
    }
} 