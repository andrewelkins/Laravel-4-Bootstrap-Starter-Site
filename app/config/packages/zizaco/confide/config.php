<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Login Throttle
    |--------------------------------------------------------------------------
    |
    | Defines how many login failed tries may be done within
    | two minutes. 
    |
    */

    'throttle_limit' => 5,

    /*
    |--------------------------------------------------------------------------
    | Form Views
    |--------------------------------------------------------------------------
    |
    | The VIEWS used to render forms with Confide methods:
    | makeLoginForm, makeSignupForm, makeForgotPasswordForm
    | and makeResetPasswordForm.
    |
    | By default, the out of the box confide views are used
    | but you can create your own forms and replace the view
    | names here. For example
    |
    |  // To use app/views/user/signup.blade.php:
    |
    | 'signup_form' => 'user.signup'
    |
    |
    */
    'login_form' =>             'confide::login',
    'signup_form' =>            'confide::signup',
    'forgot_password_form' =>   'confide::forgot_password',
    'reset_password_form' =>    'confide::reset_password', //*

    // * reset_password_form must use $token variable in hidden input field

    /*
    |--------------------------------------------------------------------------
    | Email Views
    |--------------------------------------------------------------------------
    |
    | The VIEWS used to email messages for some Confide events:
    |
    | By default, the out of the box confide views are used
    | but you can create your own forms and replace the view
    | names here. For example
    |
    |  // To use app/views/email/confirmation.blade.php:
    |
    | 'email_account_confirmation' => 'email.confirmation'
    |
    |
    */

    'email_reset_password' =>       'confide::emails.passwordreset', // with $user and $token.
    'email_account_confirmation' => 'confide::emails.confirm', // with $user

);
