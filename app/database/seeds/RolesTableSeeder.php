<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->permissions = array('manage_posts','manage_pages','manage_users','post_comment');
        $adminRole->save();

        $commentRole = new Role;
        $commentRole->name = 'comment';
        $commentRole->permissions = array('post_comment');
        $commentRole->save();

        $user = User::where('username','=','admin')->first();
        $user->attachRole( $adminRole );
        
        $user = User::where('username','=','user')->first();
        $user->attachRole( $commentRole );
    }

}
