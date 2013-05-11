<?php

class UserControllerTest extends BaseControllerTestCase {

    public function testShouldLogin()
    {
        $this->requestAction('GET', 'UserController@getLogin');
        $this->assertRequestOk();
    }

//    public function testShouldDoLogin()
//    {
//        $user = FactoryMuff::create('User', array('password'=>'123123'));
//
//        $credentials = array(
//            'email'=>$user->email,
//            'password'=>'123123',
//            'csrf_token' => Session::getToken()
//        );
//
//        $this->withInput( $credentials )
//            ->requestAction('POST', 'UserController@postLogin');
//
//        $this->assertRedirection( URL::action('UserController@getIndex') );
//    }
//
//    public function testShouldNotDoLoginWhenWrong()
//    {
//        $credentials = array(
//            'email'=>'someone@somewhere.com',
//            'password'=>'wrong',
//            'csrf_token' => Session::getToken());
//
//        $this->withInput( $credentials )
//            ->requestAction('POST', 'UserController@postLogin');
//
//        $this->assertRedirection( URL::action('UserController@getLogin') );
//    }
//
//    public function testLoginShouldRedirectOwner()
//    {
//        $this->owner();
//
//        $this->requestAction('GET', 'UserController@getLogin');
//
//        $this->assertRedirection( URL::action('UserController@getIndex') );
//    }

}