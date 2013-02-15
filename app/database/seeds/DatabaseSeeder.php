<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('RolesTableSeeder');
    }

}