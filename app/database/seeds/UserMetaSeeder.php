<?php

class UserMetaTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_metas')->delete();

        $id_admin = User::where('username', '=', 'admin')->first()->id;
        $id_user = User::where('username', '=', 'user')->first()->id;

        $users = array(
            array(
                'user_id'      => $id_admin,
                'id_number' => rand(10000,20000000),
                'first_name'   => 'nguyen',
                'last_name'   => "duoc",
                'legal_name' => "Buu khiet",
                'birthday' => new DateTime,
                'phone' => rand(1000000,9999999),
                'note' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'user_id'      => $id_user,
                'id_number' => rand(10000,20000000),
                'first_name'   => 'nguyen',
                'last_name'   => "duoc",
                'legal_name' => "Buu khiet",
                'birthday' => new DateTime,
                'phone' => rand(1000000,9999999),
                'note' => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        );

        DB::table('user_metas')->insert( $users );
    }

}
