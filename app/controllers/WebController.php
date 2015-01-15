<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/22/2014
 * Time: 4:32 PM
 */

class WebController extends BaseController {

    public function index() {
        $ad = Advertisement::whereActive('1')->lists('image');
        $featured = Product::whereFeatured_id('1')->lists('image');
        $events = Events::all()->lists('name');
        return View::make('web.home', compact('ad', 'featured', 'events'));
    }

    public function services() {
        return View::make('web.services');
    }

    public function branches() {
        return View::make('web.branches');
    }

    public function products() {
        $category = ProductCategory::all();
        $first = $category->first();
        return View::make('web.products', compact('category', 'first'));
    }

    public function contact() {
        return View::make('web.contact');
    }

    public function gallery() {
        $albums = Album::all();
        $first = $albums->first();
        $gallery = Gallery::whereAlbum_id($first->id)->paginate(10);
        return View::make('web.gallery', compact('albums', 'gallery', 'first'));
    }

    public function events() {
        return View::make('web.events');
    }
} 