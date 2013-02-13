<?php

class UserController extends BaseController {


    /**
     * Users settings page
     *
     * @return View
     */
    public function getIndex()
    {
        // Get the user information
        $user = Confide::getAuthIdentifier();

        // Show the page
        return View::make('site/user/index', compact('user'));
    }

    /**
     * Stores new user
     *
     */
    public function postIndex()
    {
        $user = new User;

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'password_confirmation' );

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ( $user->id )
        {
            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
                        return Redirect::to('user/login')
                            ->with( 'notice', Lang::get('confide::confide.alerts.account_created') );
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->getErrors()->all();

                        return Redirect::to('user/create')
                            ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Displays the form for user creation
     *
     */
    public function getCreate()
    {
        return View::make('site/user/create');
    }


    /**
     * Displays the login form
     *
     */
    public function getLogin($url1=null,$url2=null,$url3=null)
    {
        $redirect = $this->processRedirect($url1,$url2,$url3);
        return View::make('site/user/login', compact('redirect'));
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin($url1=null,$url2=null,$url3=null)
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'password' => Input::get( 'password' ),
            'remamber' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        if ( Confide::logAttempt( $input ) ) 
        {
            $r = $this->processRedirect($url1,$url2,$url3);
            if (!empty($r))
            {
                return Redirect::to($r);
            }
            return Redirect::to('/');
        }
        else
        {
            $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
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
        return View::make('site/user/forgot');
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function postForgot()
    {
        if( Confide::resetPassword( Input::get( 'email' ) ) )
        {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
                        return Redirect::to('user/login')
                            ->with( 'notice', $notice_msg );
        }
        else
        {
            $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
                        return Redirect::to('user/forgot')
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

    public function getProfile($username)
    {
        $userModel = new User;
        $user = $userModel->getUserByUsername($username);

        // Check if the user exists
        if (is_null($user))
        {
            return App::abort(404);
        }

        return View::make('site/user/profile', compact('user'));
    }

    public function getSettings()
    {
        $userModel = new User;
        $user = $userModel->getUserByUsername($username);

        // Check if the user exists
        if (is_null($user))
        {
            return App::abort(404);
        }

        return View::make('site/user/profile', compact('user'));
    }

    public function processRedirect($url1,$url2,$url3)
    {

        $redirect = '';
        if( ! empty( $url1 ) )
        {
            $redirect = $url1;
            $redirect .= (empty($url2)? '' : '/' . $url2);
            $redirect .= (empty($url3)? '' : '/' . $url3);
        }
        return $redirect;
    }
}