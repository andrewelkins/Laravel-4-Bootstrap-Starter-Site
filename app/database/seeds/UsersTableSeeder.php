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
                'confirmed'   => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'username'      => 'user',
                'email'      => 'user@test.com',
                'password'   => Hash::make('user'),
                'confirmed'   => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        );

        DB::table('users')->insert( $users );
    }

}
