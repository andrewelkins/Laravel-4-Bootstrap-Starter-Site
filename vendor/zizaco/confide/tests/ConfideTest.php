<?php

use Zizaco\Confide\Confide;
use Zizaco\Confide\ConfideEloquentRepository;
use Mockery as m;

class ConfideTest extends PHPUnit_Framework_TestCase {

    /**
     * Confide instance
     *
     * @var Zizaco/Confide/Confide
     */
    protected $confide;

    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        // Mocks the application and the repository
        $app = $this->mockApp();
        $repo = m::mock(new ConfideEloquentRepository);

        $this->confide = new Confide($repo);

        // Set the app attribute with mock
        $this->confide->app = $app;
    }

    public function testGetModel()
    {
        // Mocks an User object
        $modelObject = $this->mockConfideUser();

        // Mocks the repository
        // Repository should receive model and return an existent user
        $this->confide->repo->shouldReceive('model')
            ->andReturn($modelObject)
            ->once();

        $user = $this->confide->model();

        $this->assertEquals( $modelObject, $user );
    }

    public function testShouldGetUser()
    {
        $confide_user = $this->mockConfideUser();

        // Laravel auth component should return user
        $auth = m::mock('Illuminate\Auth\Guard');
        $auth->shouldReceive('user')
            ->andReturn( $confide_user )
            ->once();
        $this->confide->app['auth'] = $auth;

        $this->assertEquals( $confide_user, $this->confide->user() );
    }

    public function testShouldConfirm()
    {
        // Mocks the repository
        // Confirm method of repository should be called with confirm code
        // The actual confirmation is tested within ConfideRepositoryTest ;)
        $this->confide->repo->shouldReceive('confirm')
            ->with('123123')
            ->andReturn(true)
            ->once();

        $this->assertTrue( $this->confide->confirm( '123123' ) );
    }

    public function testShouldLogAttempt()
    {
        $confide_user = $this->mockConfideUser();

        $this->confide->repo->model = $confide_user;

        $credentials = array(
            'email'=>'mail',
            'username'=>'uname',
            'password'=>'123123'
        );

        // Considering a valid hash check from hash component
        $hash = m::mock('Illuminate\Hashing\HasherInterface');
        $hash->shouldReceive('check')
            ->andReturn( true );
        $this->confide->app['hash'] = $hash;

        // Mocks the repository
        // Repository should receive model and return an existent user
        $this->confide->repo->shouldReceive('getUserByIdentity')
            ->andReturn($confide_user);

        $this->confide->repo->shouldReceive('model')
            ->andReturn($confide_user);

        $this->assertTrue( 
            $this->confide->logAttempt( $credentials )
        );

        // Should not login with unconfirmed user.
        $this->assertFalse( 
            $this->confide->logAttempt( $credentials, true )
        );

        $confide_user->confirmed = 1;

        // Should login because now the user is confirmed
        $this->assertTrue( 
            $this->confide->logAttempt( $credentials, true )
        );
    }

    public function testShouldThrottleLogAttempt()
    {
        $tries = 15;

        $this->confide->app['request'] = m::mock( 'Request' );
        $this->confide->app['request']->shouldReceive('server')
            ->andReturn( '12.34.56.78' );

        $confide_user = $this->mockConfideUser();
        $confide_user->shouldReceive('get','first')
            ->andReturn( null );

        // Mocks the repository
        // Repository should receive getUserByIdentity and return an existent user
        $this->confide->repo->shouldReceive('getUserByIdentity')
            ->andReturn($confide_user);

        $this->confide->app['hash']->shouldReceive('check')
            ->andReturn( false );

        for ($i=0; $i < $tries; $i++) {

            // Simulates cache values
            $this->useCacheForThrottling($i);
        
            // Make shure the login is not happening anyway
            $this->assertFalse(
                $this->confide->logAttempt( array('email'=>'wrong', 'username'=>'wrong', 'password'=>'wrong') )
            );
        }

        // Check if the credentials has been throttled
        $this->assertTrue(
            $this->confide->isThrottled( array('email'=>'wrong', 'password'=>'wrong') )
        );
    }

    public function testShouldForgotPassword()
    {
        // Mocks an User object
        $confide_user = $this->mockConfideUser();
        $confide_user->shouldReceive('forgotPassword')
            ->once();

        // Mocks the repository
        // Repository should receive model and return an existent user
        $this->confide->repo->shouldReceive('getUserByMail')
            ->with( 'user@sample.com' )
            ->andReturn($confide_user)
            ->once();

        $result = $this->confide->forgotPassword( 'user@sample.com' );

        $this->assertTrue( $result );
    }

    public function testIsValidToken()
    {
        // Mocks the repository
        // Repository should receive model and return an existent user
        $this->confide->repo->shouldReceive('getPasswordRemindersCount')
            ->with( '123' )
            ->andReturn(true)
            ->once();

        $this->assertTrue( $this->confide->isValidToken('123') );
    }

    public function testShouldResetPassword()
    {
        $params = array( 'token'=>'123', 'user'=>'somebody' );

        // Mocks an User object
        $confide_user = $this->mockConfideUser();
        $confide_user->shouldReceive('resetPassword')
            ->with( $params )
            ->andReturn(true)
            ->once();

        // Mocks the repository
        // Repository should run methods related to password reset
        $this->confide->repo
            ->shouldReceive('getEmailByReminderToken')
            ->with( '123' )
            ->andReturn('somebody@sample.com')
            ->once()

            ->getMock()
            ->shouldReceive('getUserByMail')
            ->with( 'somebody@sample.com' )
            ->andReturn($confide_user)
            ->once()

            ->getMock()
            ->shouldReceive('deleteEmailByReminderToken')
            ->with( '123' )
            ->andReturn(true)
            ->once();

        $this->assertTrue(
            $this->confide->resetPassword( $params )
        );
    }

    public function testShouldLogout()
    {
        // Make shure auth logout method is called
        $auth = m::mock('Illuminate\Auth\Guard');
        $auth->shouldReceive('logout')
            ->once();

        $this->confide->app['auth'] = $auth;
        $this->assertNull( $this->confide->logout() );
    }

    public function testShouldMakeForms()
    {
        // Make shure view make method is called 3 times
        $view = m::mock('Illuminate\View\Environment\View');
        $view->shouldReceive('make')
            ->andReturn( 'Content' )
            ->times( 3 );

        $this->confide->app['view'] = $view;

        $this->assertNotNull( $this->confide->MakeLoginForm() );
        $this->assertNotNull( $this->confide->makeSignupForm() );
        $this->assertNotNull( $this->confide->makeForgotPasswordForm() );
    }

    public function testShouldCheckAction()
    {
        // Make shure auth logout method is called
        $url = m::mock('Url');
        $url->shouldReceive('action')
            ->with('a@b','b','c')
            ->andReturn('a/b')
            ->once();

        $this->confide->app['url'] = $url;
        $this->assertNotNull( $this->confide->checkAction('a@b','b','c') );
    }

    private function mockConfideUser()
    {
        $confide_user = m::mock( 'Illuminate\Auth\UserInterface' );
        $confide_user->username = 'uname';
        $confide_user->password = '123123';
        $confide_user->confirmed = 0;
        $confide_user->shouldReceive('where','get', 'orWhere','first', 'all','getUserFromCredsIdentity')
            ->andReturn( $confide_user );

        return $confide_user;
    }

    private function mockApp()
    {
        // Mocks the application components that
        // are not Confide's responsibility
        $app = array();

        $app['config'] = m::mock( 'Config' );
        $app['config']->shouldReceive( 'get' )
            ->with( 'auth.table' )
            ->andReturn( 'users' );

        $app['config']->shouldReceive( 'get' )
            ->with( 'auth.model' )
            ->andReturn( 'User' );

        $app['config']->shouldReceive( 'get' )
            ->with( 'app.key' )
            ->andReturn( '123' );

        $app['config']->shouldReceive( 'get' )
            ->with( 'confide::throttle_limit' )
            ->andReturn( 9 );

        $app['config']->shouldReceive( 'get' )
            ->with( 'confide::login_cache_field' )
            ->andReturn( 'email' );

        $app['config']->shouldReceive( 'get' )
            ->with( 'confide::throttle_time_period' )
            ->andReturn( 2 );

        $app['config']->shouldReceive( 'get' )
            ->with( 'confide::password_field', 'password' )
            ->andReturn( 'password' );

        $app['config']->shouldReceive( 'get' )
            ->andReturn( 'confide::login' );

        $app['mail'] = m::mock( 'Mail' );
        $app['mail']->shouldReceive('send')
            ->andReturn( null );

        $app['hash'] = m::mock( 'Hash' );
        $app['hash']->shouldReceive('make')
            ->andReturn( 'aRandomHash' );

        $app['cache'] = m::mock( 'Cache' );
        $app['cache']->shouldReceive('get')
            ->andReturn( 0 );
        $app['cache']->shouldReceive('put');

        $app['auth'] = m::mock( 'Auth' );
        $app['auth']->shouldReceive('login')
            ->andReturn( true );

        $app['request'] = m::mock( 'Request' );
        $app['request']->shouldReceive('server')
            ->andReturn( null );

        $app['db'] = m::mock( 'DatabaseManager' );
        $app['db']->shouldReceive('connection')
            ->andReturn( $app['db'] );
        $app['db']->shouldReceive('table')
            ->andReturn( $app['db'] );
        $app['db']->shouldReceive('select')
            ->andReturn( $app['db'] );
        $app['db']->shouldReceive('where')
            ->andReturn( $app['db'] );
        $app['db']->shouldReceive('first')
            ->andReturn( $app['db'] );
        $app['db']->email = 'test@example.com';

        $app['db']->shouldReceive('delete')
            ->andReturn( true );

        return $app;
    }

    private function useCacheForThrottling( $value )
    {
        $cache = m::mock('Illuminate\Cache\Store');
        $cache->shouldReceive('put')
            ->with( "confide_flogin_attempt_12.34.56.78wrong", $value+1, 2 )
            ->once();
        $cache->shouldReceive('get')
            ->andReturn( $value );
        $this->confide->app['cache'] = $cache;
    }

    /**
     * the ObjectProvider getObject method should
     * be called with $class to return $object.
     *
     * @param string $class
     * @param mixed $obj
     * @return void
     */
    private function objProviderShouldReturn( $class, $obj )
    {
        $obj_provider = m::mock('ObjectProvider');
        $obj_provider->shouldReceive('getObject')
            ->with($class)
            ->andReturn( $obj );
        
        $this->confide->objectRepository = $obj_provider;
    }
}
