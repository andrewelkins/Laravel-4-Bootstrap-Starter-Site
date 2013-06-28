<?php
namespace frontend;

use BaseController;
use UserRepositoryInterface;
use Auth;
use Lang;
use View;
use Confide;
use Redirect;
use API;
use User;
use Input;
use Session;

/*
|--------------------------------------------------------------------------
| Front End User Controller
|--------------------------------------------------------------------------
|
| Based on the default Confide controller template for controlling user
| authentication and profile management.
|
*/

class UserController extends BaseController {

    /**
     * User Repository Interface
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new controller instance
     *
     * Inject the repository interfaces.
     *
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;

        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * User profile edit form
     *
     * @return View
     */
    public function getIndex()
    {
        // If we are not logged in redirect us to login.
        if(Auth::guest()) return Redirect::action('frontend\UserController@getLogin');

        // Get the data needed for the view.
        $user = Auth::user();
        $rules = $user->getUpdateRules();
        $meta = $this->meta;
        $meta['title'] = Lang::get('user/title.user_management');

        return View::make('frontend/user/index', compact('user','rules', 'meta'));
    }

    /**
     * Displays the form for account creation
     *
     * @return View
     */
    public function getCreate()
    {
        // If we are already authentified, redirect to the profile page.
        if(Auth::user()) return Redirect::action('frontend\UserController@getIndex');

        // Get the data needed for the view.
        $user = $this->users->instance();
        // $user = API::get('api/v1/user/create');
        $rules = User::$rules;
        $meta = $this->meta;
        $meta['title'] = Lang::get('user/title.create_a_new_user');

        return View::make('frontend/user/create', compact('user', 'rules', 'meta'));
    }

    /**
     * Stores a new user account
     *
     * @return Redirect
     */
    public function postIndex()
    {
        $user = $this->users->store(Input::all());
        // $user = API::post('api/v1/user', Input::all());

        // If the API throws a ValidationException $user will be a JSON string with our errors.
        if(is_string($user)) {
            $errors = json_decode($user, true);
            return Redirect::action('frontend\UserController@getCreate')
                            ->withErrors($errors);
        } else {
            // Redirect with success message
            return Redirect::action('frontend\UserController@getLogin')
                            ->with('success', Lang::get('confide::confide.alerts.account_created'));
        }
    }

    /**
     * Edits the authentified user's account.
     *
     * @return Redirect
     */
    public function postEdit()
    {
        // If we are not authentified, redirect to the login page.
        if(Auth::guest()) return Redirect::action('frontend\UserController@getLogin');

        $user = $this->users->edit(Auth::user()->id, Input::all());
        // $user = API::put('api/v1/user/' . Auth::user()->id, Input::all());

        // If the API throws a ValidationException $user will be a JSON string with our errors.
        if(is_string($user)) {
            $errors = json_decode($user, true);
            return Redirect::action('frontend\UserController@getIndex')
                            ->withErrors($errors);
        } else {
            return Redirect::action('frontend\UserController@getIndex')
                            ->with('success', 'Profile edited!');
        }
    }

    /**
     * Displays the login form
     *
     * @return View
     */
    public function getLogin()
    {
        if(Auth::user()){
            return Redirect::action('frontend\UserController@getIndex');
        }

        $meta = $this->meta;
        $meta['title'] = 'login';

        return View::make('frontend/user/login', compact('title', 'meta'));
    }

    /**
     * Attempt to log the user in
     *
     * @return Redirect
     */
    public function postLogin()
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'username' => Input::get( 'email' ), // so we have to pass both
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        if ( Confide::logAttempt( $input ) )
        {
            // If the session 'loginRedirect' is set, then redirect
            // to that route. Otherwise redirect to '/'
            $r = Session::get('loginRedirect');
            if (!empty($r))
            {
                Session::forget('loginRedirect');
                return Redirect::to($r);
            }

            return Redirect::to('/'); // change it to '/admin', '/dashboard' or something
        }
        else
        {
            $user = new User;

            // Check if there was too many login attempts
            if( Confide::isThrottled( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            }
            elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            }
            else
            {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

                        return Redirect::to('user/login')
                            ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function getConfirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
                        return Redirect::to('user/login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
                        return Redirect::to('user/login')
                            ->with( 'error', $error_msg );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function getForgot()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     */
    public function postForgot()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
                        return Redirect::to('user/login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
                        return Redirect::to('user/forgot')
                            ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function getReset( $token )
    {
        return View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     */
    public function postReset()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
                        return Redirect::to('user/login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
                        return Redirect::to('user/reset/'.$input['token'])
                            ->withInput()
                ->with( 'error', $error_msg );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function getLogout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

}