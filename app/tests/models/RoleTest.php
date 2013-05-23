<?php

use Woodling\Woodling;

class RoleTest extends TestCase {

    public function testName()
    {
        $role = Woodling::retrieve('RoleAdmin');

        $this->assertEquals( $role->name, 'admin' );
    }
}