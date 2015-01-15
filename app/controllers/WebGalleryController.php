<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/23/2014
 * Time: 1:00 PM
 */

class WebGalleryController extends BaseController {

    public function view($id) {
        $gal = Gallery::with('Album')->where('album_id', $id)->get();
        return View::make('web.gallery.view', compact('gal'));
    }

} 