<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();


        $users = array(
            array(
                'username'      => 'admin',
                'email'      => 'admin@andrewelkins.com',
                'password'   => Hash::make('admin'),
                'confirmed'   => 0
            ),
            array(
                'username'      => 'user',
                'email'      => 'user@andrewelkins.com',
                'password'   => Hash::make('user'),
                'confirmed'   => 0
            )
        );

        foreach( $users as $user )
        {
            DB::table('users')->insert(
                $user
            );
//            User::create($user);
//            $u = new User;
//            $u->username = $user['username'];
//            $u->email = $user['email'];
//            $u->password = $user['password'];
//            $u->password_confirmation = $user['password'];
//            $u->confirmed = $user['confirmed'];
//            $u->save();
//            unset($u);
        }
    }

}