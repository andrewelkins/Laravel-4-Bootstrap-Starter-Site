<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $userRole = new Role;
        $userRole->name = 'user';
        $userRole->save();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();

        $user = User::where('username','=','user')->first();
        $user->attachRole( $userRole );

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );
    }

}
