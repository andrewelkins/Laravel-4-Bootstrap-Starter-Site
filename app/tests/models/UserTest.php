<?php

use Mockery as m;
use Woodling\Woodling;

class UserTest extends TestCase {

//    protected $userAdmin;
//    protected $userUser;
//
//    public function __constructor()
//    {
//        $this->userAdmin = Woodling::retrieve('UserAdmin');
//        $this->userUser = Woodling::retrieve('UserUser');
//    }

    public function testUsername()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertEquals( $user->username, 'admin' );
    }

}
