<?php
/**
 * Created by PhpStorm.
 * User: Gipoy17
 * Date: 10/18/2014
 * Time: 12:38 PM
 */

class AdminController extends BaseController {

    public function showLogin() {
        $ad = Advertisement::whereActive('1')->lists('image');
        $featured = Product::whereFeatured_id('1')->lists('image');
        $events = Events::all()->lists('name');

        if (Auth::guest())
            return View::make('admin.login', compact('ad', 'featured', 'events'));
        else
            return Redirect::to('/dashboard');
    }

    public function login() {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        $rules = array(
            'username'  => 'Required|min:5|max:25',
            'password'  => 'Required|min:5|max:25'
        );

        $validator = Validator::make($user, $rules);
        if ($validator->passes()) {
            if (Auth::attempt($user)) {
                if(User::getStatus(Auth::user()->id) == 1) {
                    $username = Auth::user()->username;
                    Auth::logout();
                    return View::make('error.already_login', compact('username'));
                }
                User::changeStatus(Auth::user()->id, 1);
                return Redirect::to('/dashboard');
            }
            else
                return Redirect::back()->withErrors(array('password' => 'Invalid username or password'))->withInput(Input::except('password'));
        }
        return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
    }
    public  function logout() {
        User::changeStatus(Auth::user()->id, 0);
        Auth::logout();
        return Redirect::to('/');
    }
}