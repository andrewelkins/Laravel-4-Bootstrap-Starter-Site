<?php

use Woodling\Woodling;

class RoleTest extends TestCase {

    public function testName()
    {
        $role = Woodling::retrieve('RoleAdmin');

        $this->assertEquals( $role->name, 'admin' );
    }

    public function testPreparePermissionsForSavePosts()
    {
        $role = Woodling::retrieve('RoleAdmin');

        $perms = $role->preparePermissionsForSave(array( 1 => 1 ));

        $this->assertEquals( $perms[1], 'manage_posts' );
    }

    public function testPreparePermissionsForSavePages()
    {
        $role = Woodling::retrieve('RoleAdmin');

        $perms = $role->preparePermissionsForSave(array( 2 => 1 ));

        $this->assertEquals( $perms[2], 'manage_pages' );
    }

    public function testPreparePermissionsForSaveUsers()
    {
        $role = Woodling::retrieve('RoleAdmin');

        $perms = $role->preparePermissionsForSave(array( 3 => 1 ));

        $this->assertEquals( $perms[3], 'manage_users' );
    }

    public function testPreparePermissionsForSaveComment()
    {
        $role = Woodling::retrieve('RoleAdmin');

        $perms = $role->preparePermissionsForSave(array( 4 => 1 ));

        $this->assertEquals( $perms[4], 'post_comment' );
    }
}