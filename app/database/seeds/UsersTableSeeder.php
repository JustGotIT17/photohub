<?php

class UsersTableSeeder extends Seeder {

    public function run() {
        User::truncate();

        User::create(array(
            'username'  => 'admin',
            'firstName'  => 'PhotoHub',
            'lastName'  => 'Administrator',
            'password'  => Hash::make('admin'),
            'email'     => 'admin@photohub.ph',
            'roleid' => 1,
            'branchID' => 1
        ));
    }
}