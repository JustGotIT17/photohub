<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 11/26/2014
 * Time: 6:16 PM
 */

class EventController extends BaseController {

    public function index() {
        $events = Events::paginate(25);
        return View::make('admin.event.index', compact('events'));
    }

    public function create() {

        $files = Input::file('files');
        $in = Input::all();


            $rules = array(
                'name' => 'required',
                'description' => 'required',
                'eventDate' => 'required',
            );

            $validator = \Validator::make($in, $rules);
            if ($validator->passes()) {
                Events::create([
                    'name' => $in['name'],
                    'description' => $in['description'],
                    'event_date' => $in['eventDate'],
                    'image' => '',
                ]);
                return Redirect::back();

            }

            return Redirect::back()->withErrors($validator)->withInput(Input::all());

    }

    public function delete($id) {
        $event = Events::find($id);
        $event->delete();
        return Redirect::back();
    }
}