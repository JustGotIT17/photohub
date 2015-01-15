<?php
class GalleryController extends BaseController {


    public function index() {
        $albums = Album::with('Gallery')->paginate(25);
        $album = [];
        foreach (Album::all() as $eAlbum)
            $album[$eAlbum->id] = $eAlbum->name;

        return View::make('admin.Gallery.index', compact('albums','album'));
    }
    public function view($id) {
        $gal = Gallery::with('Album')->where('album_id', $id)->get();
        return View::make('admin.Gallery.view', compact('gal'));
    }
    public function upload() {
        $files = Input::file('files');
        $in = Input::all();

        foreach($files as $file) {
            $rules = array(
                'file' => 'required|mimes:png,jpeg|max:20000'
            );

            $validator = \Validator::make(array('file'=> $file), $rules);
            if($validator->passes()){

                $id = Str::random(14);

                $destinationPath = 'uploads/gallery/';
                $filename = $in['album'] . '-' . $id. $file->getClientOriginalName();
                $mime_type = $file->getMimeType();
                $extension = $file->getClientOriginalExtension();
                $upload_success = $file->move('public/'.$destinationPath, $filename);
                if($upload_success) {
                    Gallery::create([
                        'path' => $destinationPath . $filename,
                        'album_id' => $in['album'],
                    ]);
                }


            } else {
                return Redirect::back()->with('error', 'I only accept images.');
            }
        }
        return Redirect::back();
    }

    public function delete($id) {
        $photo = Gallery::find($id);
        $photo->delete();
        return Redirect::back();
    }
}