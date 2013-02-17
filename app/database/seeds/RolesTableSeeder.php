<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert( array(
            array(
                'name'    => 'admin',
                'permissions'      => '{"1":"manage_posts","2":"manage_pages","3":"manage_users","4":"post_comment"}'
            ),
            array(
                'name'    => 'comment',
                'permissions'      => '{"4":"post_comment"}'
            ))
        );

        $user = User::where('username','=','admin')->first();
        $user->attachRole( 'admin' );
        $user = User::where('username','=','user')->first();
        $user->attachRole( 'comment' );
    }

}
