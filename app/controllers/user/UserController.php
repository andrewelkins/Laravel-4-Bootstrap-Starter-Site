<?php

class UserController extends BaseController {

    /**
     * Shows public user profile
     *
     * @return View
     */
    public function getIndex()
    {
        // Show the page
        return View::make('site/user/dashboard');
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
     * Displays the login form
     *
     */
    public function getLogin()
    {
        return View::make('site/user/login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
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


    /**
     * Users settings page
     *
     * @return View
     */
    public function getSettings()
    {
        // Get the user information
        $user = Confide::getAuthIdentifier();

        // Show the page
        return View::make('site/user/settings', compact('user'));
    }

    /**
     * Users settings form processing page.
     *
     * @return Redirect
     */
    public function postSettings()
    {
        // Declare the rules for the form validation
        $rules = array(
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email,' . Sentry::getUser()->email . ',email',
        );

        // If we are updating the password
        if (Input::get('password'))
        {
            // Update the validation rules
            $rules['password']              = 'required|Confirmed';
            $rules['password_confirmation'] = 'required';
        }

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the user
            $user = Sentry::getUser();
            $user->first_name = Input::get('first_name');
            $user->last_name  = Input::get('last_name');
            $user->email      = Input::get('email');

            // Are we updating the user password?
            if (Input::get('password'))
            {
                $user->password = Input::get('password');
            }

            // Save the user
            $user->save();

            // Redirect to the register page
            return Redirect::to('user/settings')->with('success', 'Account updated with success!');
        }

        // Something went wrong
        return Redirect::to('user/settings')->withInput()->withErrors($validator->messages());
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

}