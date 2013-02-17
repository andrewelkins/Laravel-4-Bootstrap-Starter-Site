<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();


        $users = array(
            array(
                'username'      => 'admin',
                'email'      => 'admin@test.com',
                'password'   => Hash::make('admin'),
                'confirmed'   => 0
            ),
            array(
                'username'      => 'user',
                'email'      => 'user@test.com',
                'password'   => Hash::make('user'),
                'confirmed'   => 0
            )
        );

        foreach( $users as $user )
        {
            DB::table('users')->insert(
                $user
            );
        }
    }

}
