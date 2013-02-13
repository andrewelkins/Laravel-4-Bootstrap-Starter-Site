<?php

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        Role::create(
            array(
                'name'    => 'admin',
                'title'      => '{\"1\":\"manage_posts\",\"2\":\"manage_pages\",\"3\":\"manage_users\",\"4\":\"post_comment\"}'
            ),
            array(
                'name'    => 'comment',
                'title'      => '{\"4\":\"post_comment\"}'
            ));

        $user = User::where('username','=','test')->first();
        $user->attachRole( 'admin' );
        $user = User::where('username','=','test_commenter')->first();
        $user->attachRole( 'comment' );
    }

}
