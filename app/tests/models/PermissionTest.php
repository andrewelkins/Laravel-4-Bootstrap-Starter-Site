<?php

use Woodling\Woodling;

class PermissionTest extends TestCase {

    public function testName()
    {
        $permission = Woodling::retrieve('manage_posts');

        $this->assertEquals( $permission->name, 'manage_posts' );
        $this->assertEquals( $permission->display_name, 'manage posts' );
    }
}