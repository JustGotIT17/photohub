<?php
class AlbumController extends BaseController {

    public function create() {
        $in = Input::all();
        $rules = [
            'name' => 'required|min:1:max:255',
            'description' => 'required|min:1:max:255'
        ];
        $validation = Validator::make($in, $rules);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        Album::create([
            'name' => $in['name'],
            'description' => $in['description'],
        ]);

        return Redirect::to('/gallery');
    }
}