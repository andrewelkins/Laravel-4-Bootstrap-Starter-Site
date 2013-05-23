<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
    }

}