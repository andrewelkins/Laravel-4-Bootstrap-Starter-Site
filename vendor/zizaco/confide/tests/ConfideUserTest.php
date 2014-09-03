<?php

use Zizaco\Confide\ConfideUser;
use Mockery as m;

class ConfideUserTest extends PHPUnit_Framework_TestCase {

    /**
     * ConfideUser instance
     *
     * @var Zizaco/Confide/Confideuser
     */
    protected $confide_user;

    public function tearDown()
    {
        m::close();
    }

    public static function setUpBeforeClass()
    {
        /**
         * For ConfideUser real_save() method:
         * Runs the real eloquent save method or returns
         * true if it's under testing. Because eloquent
         * save method is not Confide's responsibility.
         *
         */
        define('CONFIDE_TEST', true);
    }

    public function setUp()
    {
        ConfideUser::$app = $this->mockApp();

        $this->confide_user = new ConfideUser;
    }

    private function populateUser()
    {
        $this->confide_user->username = 'uname';
        $this->confide_user->password = '123123';
        $this->confide_user->email = 'mail@sample.com';
        $this->confide_user->confirmation_code = '456456';
        $this->confide_user->confirmed = true;
    }

    public function testShouldGetAuthPassword()
    {
        $this->populateUser();

        $this->assertEquals( $this->confide_user->password, $this->confide_user->getAuthPassword() );
    }

    public function testShouldConfirm()
    {
        $this->populateUser();

        // Should call confirmUser of the repository
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive('confirmUser')
            ->with( $this->confide_user )
            ->andReturn( true )
            ->once();

        $this->assertTrue( $this->confide_user->confirm() );

        $this->assertEquals( 1, $this->confide_user->confirmed );
    }

    public function testShouldSendForgotPassword()
    {
        // Should call forgotPassword of the repository
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive('forgotPassword')
            ->with( $this->confide_user )
            ->andReturn( true )
            ->once();

        // Should send an email once
        ConfideUser::$app['mailer'] = m::mock( 'Mail' );
        ConfideUser::$app['mailer']->shouldReceive('send')
            ->andReturn( null )
            ->atLeast(1);

        $this->populateUser();

        $old_password = $this->confide_user->password;

        $this->assertTrue( $this->confide_user->forgotPassword() );
    }

    public function testShouldChangePassword()
    {
        $credentials = array(
            'email'=>'mail@sample.com',
            'password'=>'987987',
            'password_confirmation'=>'987987'
        );

        // Should call changePassword of the repository
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive('changePassword')
            ->with( $this->confide_user, 'aRandomHash' )
            ->andReturn( true )
            ->once();

        // Should call validate method
        ConfideUser::$app['confide.repository']->shouldReceive('validate')
            ->andReturn( true )
            ->once();

        ConfideUser::$app['confide.repository']->shouldReceive('model')
            ->andReturn( new ConfideUser )
            ->once();

        $this->populateUser();

        $old_password = $this->confide_user->password;

        $this->assertTrue( $this->confide_user->resetPassword( $credentials ) );
    }

    public function testShouldNotChangePassword()
    {
        // Password should not be changed because it is empty
        $credentials = array(
            'email'=>'mail@sample.com',
            'password'=>'',
            'password_confirmation'=>''
        );

        // Should not call changePassword of the repository
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive( 'changePassword' )
            ->never();

        // Should call validate method
        ConfideUser::$app['confide.repository']->shouldReceive('validate')
            ->andReturn( false )
            ->times(4);

        ConfideUser::$app['confide.repository']->shouldReceive('model')
            ->andReturn( new ConfideUser )
            ->times(4);

        $this->populateUser();

        $this->assertFalse( $this->confide_user->resetPassword( $credentials ) );

        // Additional asserts
        // Password should not be changed because it is too short
        $credentials = array(
            'email'=>'mail@sample.com',
            'password'=>'39a',
            'password_confirmation'=>'39a'
        );
        $this->assertFalse( $this->confide_user->resetPassword( $credentials ) );

        // Password should not be changed because it is too long
        $credentials = array(
            'email'=>'mail@sample.com',
            'password'=>'1a2f34g5uj887n',
            'password_confirmation'=>'1a2f34g5uj887n'
        );
        $this->assertFalse( $this->confide_user->resetPassword( $credentials ) );

        // Password should not be changed because it is not confirmed
        $credentials = array(
            'email'=>'mail@sample.com',
            'password'=>'987987',
            'password_confirmation'=>'562906'
        );
        $this->assertFalse( $this->confide_user->resetPassword( $credentials ) );
    }

    public function testShouldNotSaveDuplicated()
    {
        // Make sure that userExists return 1 to simulates a duplicated user
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive('userExists')
            ->with( $this->confide_user )
            ->andReturn( 1 )
            ->once();

        $this->populateUser();
        $this->confide_user->confirmation_code = '';
        $this->confide_user->confirmed = false;

        $this->assertFalse( $this->confide_user->save() );
    }

    public function testShouldSaveValidUser()
    {
        // Make sure that userExists return 0 to simulates a valid user
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive('userExists')
            ->with( $this->confide_user )
            ->andReturn( 0 )
            ->once();

        $this->populateUser();
        $this->confide_user->confirmation_code = '';
        $this->confide_user->confirmed = false;

        $this->assertTrue( $this->confide_user->save() );
    }

    public function testShouldGenerateConfirmationCodeOnSave()
    {
        // Make sure that userExists return 0
        ConfideUser::$app['confide.repository'] = m::mock( 'ConfideRepository' );
        ConfideUser::$app['confide.repository']->shouldReceive('userExists')
            ->with( $this->confide_user )
            ->andReturn( 0 )
            ->once();

        // Should send an email once
        ConfideUser::$app['mailer'] = m::mock( 'Mail' );
        ConfideUser::$app['mailer']->shouldReceive('send')
            ->andReturn( null )
            ->once();

        $this->populateUser();
        $this->confide_user->confirmation_code = '';
        $this->confide_user->confirmed = false;

        $old_cc = $this->confide_user->confirmation_code;

        $this->assertTrue( $this->confide_user->save() );

        $new_cc = $this->confide_user->confirmation_code;

        // Should have generated a new confirmation code
        $this->assertNotEquals( $old_cc, $new_cc );
    }

    public function testShouldNotGenerateConfirmationCodeIfExists()
    {
        $this->populateUser();

        // Considering the model was already saved (this will make sure to
        // not trigger the ConfideRepository::userExists method)
        $this->confide_user->id = 1;

        $old_cc = $this->confide_user->confirmation_code;

        $this->assertTrue( $this->confide_user->save() );

        $new_cc = $this->confide_user->confirmation_code;

        // Should not change confirmation code
        $this->assertEquals( $old_cc, $new_cc );
    }

    private function mockApp()
    {
        // Mocks the application components
        $app = array();

        $app['config'] = m::mock( 'Config' );
        $app['config']->shouldReceive( 'get' )
            ->with( 'auth.table' )
            ->andReturn( 'users' );

        $app['config']->shouldReceive( 'getEnvironment' )
            ->andReturn( 'production' );

        $app['config']->shouldReceive( 'get' )
            ->with( 'app.key' )
            ->andReturn( '123' );

        $app['config']->shouldReceive( 'get' )
            ->with( 'confide::throttle_limit' )
            ->andReturn( 9 );

        $app['config']->shouldReceive( 'get' )
            ->andReturn( 'confide::login' );

        $app['mailer'] = m::mock( 'Mail' );
        $app['mailer']->shouldReceive('send')
            ->andReturn( null );

        $app['hash'] = m::mock( 'Hash' );
        $app['hash']->shouldReceive('make')
            ->andReturn( 'aRandomHash' );

        $app['cache'] = m::mock( 'Cache' );
        $app['cache']->shouldReceive('get')
            ->andReturn( false );
        $app['cache']->shouldReceive('put')
            ->andReturn( true );

        $app['translator'] = m::mock( 'Translator' );
        $app['translator']->shouldReceive('get')
            ->andReturn( 'aTranslatedString' );

        $app['db'] = m::mock( 'DatabaseManager' );
        $app['db']->shouldReceive('connection')
            ->andReturn( $app['db'] );

        $app['db']->shouldReceive('table')
            ->andReturn( $app['db'] );

        $app['db']->shouldReceive('insert')
            ->andReturn( $app['db'] );

        $app['db']->shouldReceive('where')
            ->andReturn( $app['db'] );

        $app['db']->shouldReceive('first')
            ->andReturn( $app['db'] );

        $app['db']->shouldReceive('update')
            ->andReturn( true );

        return $app;
    }

}
