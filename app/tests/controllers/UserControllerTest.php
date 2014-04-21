<?php

use \Illuminate\Session\TokenMismatchException;

class UserControllerTest extends BaseControllerTestCase {

    public function testShouldLogin()
    {
        $this->requestAction('GET', 'UserController@getLogin');
        $this->assertRequestOk();
    }

    public function testShouldDoLogin()
    {
        $credentials = array(
            'email'=>'admin@example.org',
            'password'=>'admin',
            'csrf_token' => Session::getToken()
        );

        $this->withInput( $credentials )
            ->requestAction('POST', 'UserController@postLogin');

        $this->assertRedirection( URL::action('BlogController@getIndex') );
    }

    public function testShouldNotDoLoginWhenWrong()
    {
        $credentials = array(
            'email'=>'someone@somewhere.com',
            'password'=>'wrong',
            'csrf_token' => Session::getToken());

        $this->withInput( $credentials )
            ->requestAction('POST', 'UserController@postLogin');

        $this->assertRedirection( URL::action('UserController@getLogin') );
    }

    /**
     * @expectedException  TokenMismatchException
     */
    public function testShouldNotDoLoginWhenTokenWrong()
    {
        $credentials = array(
            'email'=>'admin@example.org',
            'password'=>'admin',
            'csrf_token' => ''
        );

        $this->withInput( $credentials )
            ->requestAction('POST', 'UserController@postLogin');
    }

    /**
     * Testing redirect with logged in user.
     */
    public function testLoginShouldRedirectUser()
    {
        $credentials = array(
            'email'=>'admin@example.org',
            'password'=>'admin',
            'csrf_token' => Session::getToken()
        );

        $this->withInput( $credentials )
            ->requestAction('POST', 'UserController@postLogin');

        $this->requestAction('GET', 'UserController@getLogin');

        $this->assertRedirection( URL::to('/') );
    }

}
