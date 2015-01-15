<?php

class UserController extends BaseController {

    public function index() {
        if(Auth::user()->role_id == 1)
            $user = User::paginate(25);
        else
            $user = User::where('branch_id', Auth::user()->branch_id)->paginate(25);
        $role = [];
        $branch = [];

        foreach (Branch::all() as $eBranch)
            $branch[$eBranch->id] = $eBranch->name;
        foreach (Role::all() as $eRole)
            $role[$eRole->id] = $eRole->name;

        return View::make('admin.user.index', compact('user', 'branch', 'role'));
    }

    public function add() {
        $in = Input::all();
        $rules = [
            'username'=>'required|min:6|max:25|unique:users',
            'lastName'=>'required|max:25|alpha_dash',
            'firstName'=>'required|max:25|alpha_dash',
            'email'=>'required|email',
            'password'  => $in['password'] ? 'required|min:6|alpha_num|same:cpassword' : '',
            'cpassword' => $in['cpassword'] ? 'required|alpha_num|same:password' : '',
        ];

        $messages = [
            'same'    => 'The passwords must match.',
        ];

        $validation = Validator::make($in, $rules, $messages);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        User::create([
            'username'=>$in['username'],
            'firstName'=>$in['firstName'],
            'lastName'=>$in['lastName'],
            'password' => Hash::make($in['password']),
            'email'=>$in['email'],
            'role_id' => $in['roleID'],
            'branch_id'=>$in['branchID'],
        ]);
        return Redirect::to('/users')->with('success', 'The new user has been successfully added.');
    }

    public function edit($id) {
        $user = User::find($id);
        $role = [];
        $branch = [];
        //executes when role is not admin
        if(Auth::user()->role_id != '1') {
            foreach (Branch::where('id', Auth::user()->branch_id)->get() as $eBranch)
                $branch[$eBranch->id] = $eBranch->name;
            foreach (Role::where('id', '!=', 1)->get() as $eRole)
                $role[$eRole->id] = $eRole->name;
            return View::make('admin.user.edit', compact('user', 'branch', 'role'));
        }
        //executes when admin
        foreach (Branch::all() as $eBranch)
            $branch[$eBranch->id] = $eBranch->name;
        foreach (Role::all() as $eRole)
            $role[$eRole->id] = $eRole->name;
        return View::make('admin.user.edit', compact('user', 'branch', 'role'));
    }

    public function save($id) {

        $user = User::find($id);
        $in = Input::all();

        if(Auth::user()->role_id != '1') {
            $rules = [
                'lastName' => 'required|max:25|alpha_dash',
                'firstName' => 'required|max:25|alpha_dash',
                'email' => 'required|email',
                'curpassword' => 'required|min:6|alpha_num',
                'password' => 'required|min:6|alpha_num|same:cpassword',
                'cpassword' => 'required|alpha_num|same:password',
            ];
        } else {
            $rules = [
                'lastName' => 'required|max:25|alpha_dash',
                'firstName' => 'required|max:25|alpha_dash',
                'email' => 'required|email',
                'password' => 'required|min:6|alpha_num|same:cpassword',
                'cpassword' => 'required|alpha_num|same:password',
            ];
        }
        $messages = [
            'same'    => 'The passwords must match.',
        ];

        $validation = Validator::make($in, $rules, $messages);
        if($validation->fails())
            return Redirect::back()->withErrors($validation)->withInput(Input::all());

        if(Auth::user()->role_id != '1') {
            if(!Hash::check($in['curpassword'], $user->password))
                return Redirect::back()->with('notify', 'Try!');
        }

        $user->lastName = $in['lastName'];
        $user->firstName = $in['firstName'];
        $user->email = $in['email'];
        $user->password = Hash::make($in['password']);
        $user->save();
        return Redirect::to('/users');
    }
    public function remove($id) {
        User::find($id)->delete();
        return Redirect::back()->with('success', 'User has been successfully deleted.');
    }

    public function online() {
        $ol = User::with('branch')->where('isOnline', 1)->orderBy('username', 'ASC')->paginate(25);
        $status = ['0'=>'Offline' ,'1'=>'Online'];
        return View::make('admin.user.online', compact('ol', 'status'));

    }
    public function setStatus($id, $status) {
        if ($status == 0 || $status == 1)
            User::changeStatus($id, $status);

        return Redirect::back();
    }
}