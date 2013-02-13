<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username'      => 'admin',
            'email'      => 'admin@example.com',
            'password'   => Hash::make('admin'),
            'confirmed'   => 1
        ),
        array(
            'username'      => 'user',
            'email'      => 'user@example.com',
            'password'   => Hash::make('user'),
            'confirmed'   => 1
        ));
    }

}