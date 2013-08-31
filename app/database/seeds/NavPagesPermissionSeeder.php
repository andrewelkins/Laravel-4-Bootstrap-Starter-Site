<?php

class NavPagesPermissionSeeder extends Seeder {

    public function run()
    {
        
        $permissions = array(
            array(
                'name'      => 'manage_navigation',
                'display_name'      => 'manage navigation'
            ),
            array(
                'name'      => 'manage_pages',
                'display_name'      => 'manage pages'
            ),
            array(
                'name'      => 'manage_navigation_groups',
                'display_name'      => 'Manage navigation groups'
            )
        );

        DB::table('permissions')->insert( $permissions );
    }

}
