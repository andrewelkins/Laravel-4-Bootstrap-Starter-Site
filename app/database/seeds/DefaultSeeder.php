<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('PostTableSeeder');
        $this->call('CommentTableSeeder');
        $this->call('RoleTableSeeder');
    }

}