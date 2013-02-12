<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username'      => 'test',
            'email'      => 'test@test.com',
            'password'   => Hash::make('test'),
            'confirmed'   => 0
        ));
    }

}