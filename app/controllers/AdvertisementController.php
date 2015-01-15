<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/25/2014
 * Time: 2:18 PM
 */

class AdvertisementController extends BaseController {
    public function index() {
        $advertisements = Advertisement::all();
        $branch = [];
        foreach (Branch::all() as $eBranch)
            $branch[$eBranch->id] = $eBranch->name;
        return View::make('admin.advertisement.index', compact('branch', 'advertisements'));
    }

    public function create()
    {
        $files = Input::file('files');
        $in = Input::all();

        foreach ($files as $file) {
            $rules = array(
                'file' => 'required|mimes:png,jpeg|max:20000'
            );

            $validator = Validator::make(array('file' => $file), $rules);
            if ($validator->passes()) {
                $id = Str::random(14);
                $destinationPath = 'uploads/advertisement/';
                $filename = $in['branch'] . '-' . $id . $file->getClientOriginalName();
                $mime_type = $file->getMimeType();
                $extension = $file->getClientOriginalExtension();
                $upload_success = $file->move('public/' . $destinationPath, $filename);
                if ($upload_success) {
                    Advertisement::create([
                        'name' => (strlen($in['name']) > 0) ? $in['name'] : 'no_name',
                        'image' => $destinationPath . $filename,
                        'branch_id' => $in['branch'],
                    ]);
                }
            } else {
                return Redirect::back()->with('error', 'I only accept images.');
            }
        }
        return Redirect::back();
    }
}