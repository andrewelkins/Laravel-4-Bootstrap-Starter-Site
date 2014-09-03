# Confide (Laravel4 Package)

![Confide Poster](https://dl.dropbox.com/u/12506137/libs_bundles/confide.png)

[![Build Status](https://api.travis-ci.org/Zizaco/confide.png)](https://travis-ci.org/Zizaco/confide)
[![ProjectStatus](http://stillmaintained.com/Zizaco/confide.png)](http://stillmaintained.com/Zizaco/confide)

Confide is a authentication solution for **Laravel4** made to eliminate repetitive tasks involving the management of users: Account creation, login, logout, confirmation by e-mail, password reset, etc.

Confide aims to be simple to use, quick to configure and flexible.

> Note: If you are using MongoDB check [Confide Mongo](https://github.com/Zizaco/confide-mongo).

## Features

**Current:**
- Account confirmation (through confirmation link).
- Password reset (sending email with a change password link).
- Easily render forms for login, signup and password reset.
- Generate customizable routes for login, signup, password reset, confirmation, etc.
- Generate a customizable controller that handles the basic user account actions.
- Contains a set of methods to help basic user features.
- Integrated with the Laravel Auth component/configs.
- Field/model validation (Powered by [Ardent](http://laravelbook.github.com/ardent "Ardent")).
- Login throttling.
- Redirecting to previous route after authentication.
- Checks for unique email and username in signup

If you are looking for user roles and permissions see [Entrust](https://github.com/Zizaco/entrust)

For MongoDB support see [Confide Mongo](https://github.com/Zizaco/confide-mongo)

**Planned:**
- Captcha in user signup and password reset.

**Warning:**

By default a confirmation email is sent and users are required to confirm the email address.
It is easy to change this in the confide config file.
Change signup_email and signup_confirm to false if you do not want to send them an email and they do not need
to be confirmed to be able to login to the website.

## Quick start

### Required setup

In the `require` key of `composer.json` file add the following

    "zizaco/confide": "3.2.x"

Run the Composer update comand

    $ composer update

In your `config/app.php` add `'Zizaco\Confide\ConfideServiceProvider'` to the end of the `$providers` array

    'providers' => array(

        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        ...
        'Zizaco\Confide\ConfideServiceProvider',

    ),

At the end of `config/app.php` add `'Confide'    => 'Zizaco\Confide\ConfideFacade'` to the `$aliases` array

    'aliases' => array(

        'App'        => 'Illuminate\Support\Facades\App',
        'Artisan'    => 'Illuminate\Support\Facades\Artisan',
        ...
        'Confide'    => 'Zizaco\Confide\ConfideFacade',

    ),

### Configuration

Set the properly values to the `config/auth.php`. This values will be used by confide to generate the database migration and to generate controllers and routes.

Set the `address` and `name` from the `from` array in `config/mail.php`. Those will be used to send account confirmation and password reset emails to the users.

### User model

Now generate the Confide migration and the reminder password table migration:

    $ php artisan confide:migration

It will generate the `<timestamp>_confide_setup_users_table.php` migration. You may now run it with the artisan migrate command:

    $ php artisan migrate

It will setup a table containing `email`, `password`, `confirmation_code` and `confirmed` fields, which are the default fields needed for Confide use. Feel free to add more fields to the database.

Change your User model in `app/models/User.php` to:

    <?php

    use Zizaco\Confide\ConfideUser;

    class User extends ConfideUser {

    }

`ConfideUser` class will take care of some behaviors of the user model.

### Dump the default accessors

Lastly, you can dump a default controller and the default routes for Confide.

    $ php artisan confide:controller
    $ php artisan confide:routes

Don't forget to dump composer autoload

    $ composer dump-autoload

**And you are ready to go.**
Access `http://yourapp/user/create` to create your first user. Check the `app/routes.php` to see the available routes.

## Usage in detail

**Basic setup:**

1. Database connection in `config/database.php` running properly.
2. Correct model and table names in `config/auth.php`. They will be used by Confide all the time.
3. `from` configuration in `config/mail.php`.

**Configuration:**

1. `ConfideServiceProvider` and `ConfideFacade` entry in `config/app.php` `'providers'` and `'aliases'` respectively.
2. User model (with the same name as in `config/auth.php`) should extend `ConfideUser` class. This will cause to methods like `resetPassword()`, `confirm()` and a overloaded `save()` to be available.

**Optional steps:**

1. Use `Confide` facade to dump login and signup forms easly with `makeLoginForm()` and `makeSignupForm()`. You can render the forms within your views by doing `{{ Confide::makeLoginForm()->render() }}`.
2. Generate a controller with the template contained in Confide throught the artisan command `$ php artisan confide:controller`. If a controller with the same name exists it will **NOT** be overwritten.
3. Generate routes matching the controller template throught the artisan command `$ php artisan confide:routes`. Your `routes.php` will **NOT** be overwritten.

### Advanced

#### Using custom table / model name

You can change the model name that will be authenticated in the `config/auth.php` file.
Confide uses the values present in that configuration file.

To change the controller name when dumping the default controller template you can use the --name option.

    $ php artisan confide:controller --name Employee

Will result in `EmployeeController`

Then, when dumping the routes, you should use the --controller option to match the existing controller.

    $ php artisan confide:routes --controller Employee

#### Using custom form or emails

First, publish the config files:

    $ php artisan config:publish zizaco/confide

Then edit the view names in `app/config/packages/zizaco/confide/config.php`.

#### Update a User

To update an user already in the database you'll Need to make sure your ruleset is using the unique validator within the User model.

    <?php

    use Zizaco\Confide\ConfideUser;

    class User extends ConfideUser {
    
    public static $rules = array(
        'username' => 'unique:users,username',
        'email' => 'email'
    );
    
    ?>

    <?php 
    
    class UserController extends Controller {
    
        public function postCreate() {
    
            // In real usage you'll need to find the user that is being modified.
            // 1 is set just as an example.
            $user = User::find(1);
        
            // Update a user attribute from a form.
            // Using email as an example.
            $user->email = Input::get('email'); 
        
            // Save
            // This was previously update, but Ardent changed.
            $user->updateUniques(); 
      
        }
    }
    
    ?>
    
This will allow you to update the current user.

#### Validate model fields

To change the validation rules of the User model you can take a look at [Ardent](http://laravelbook.github.com/ardent/#validation "Ardent Validation Rulez"). For example:

    <?php

    use Zizaco\Confide\ConfideUser;

    class User extends ConfideUser {

        /**
         * Validation rules
         */
        public static $rules = array(
            'email' => 'required|email',
            'password' => 'required|between:4,11|confirmed',
        );

    }

Feel free to add more fields to your table and to the validation array. Then you should build your own sign-up form with the additional fields.

NOTE: If you add fields to your validation rules into your model like above, do not forget you have to add those fields to the UserController store function also. If you forget this, the form will always return with an error.
Example: $user->terms = Input::get('terms');

#### Passing additional information to the make methods

If you want to pass additional parameters to the forms, you can use an alternate syntax to achieve this. 

Instead of using the make method:
    
    Confide::makeResetPasswordForm( $token ):

You would use:

    View::make(Config::get('confide::reset_password_form'))
        ->with('token', $token);
        
It produces the same output, but you would be able to add more inputs using 'with' just like any other view.

#### RESTful controller

If you want to generate a [RESTful controller](https://github.com/laravel/docs/blob/master/controllers.md#restful-controllers) you can use the aditional `--restful` or `-r` option.

    $ php artisan confide:controller --restful

Will result in a [RESTful controller](https://github.com/laravel/docs/blob/master/controllers.md#restful-controllers)

Then, when dumping the routes, you should use the --restful option to match the existing controller.

    $ php artisan confide:routes --restful
    
#### User roles and permissions

In order not to bloat Confide with not related features, the role and permission was developed as another package: [Entrust](https://github.com/Zizaco/entrust). This package couples very well with Confide.

See [Entrust](https://github.com/Zizaco/entrust)

#### Redirecting to previous route after login

When defining your filter you should use the Redirect::guest('user/login') within your auth filter. For example:

    // filters.php

    Route::filter('auth', function()
    {
        if ( Auth::guest() ) // If the user is not logged in
        {
            return Redirect::guest('user/login');
        }
    });

    // Only authenticated users will be able to access routes that begins with
    // 'admin'. Ex: 'admin/posts', 'admin/categories'.
    Route::when('admin*', 'auth'); 

or, if you are using [Entrust](https://github.com/Zizaco/entrust) ;)

    // filters.php

    Entrust::routeNeedsRole( 'admin*', 'Admin', function(){
            return Redirect::guest('user/login');
    } );

Finally, it'll auto redirect if your controller's user/login function uses Redirect:intended('a/default/url/here') after a successful login.
The [generated controller](https://github.com/Zizaco/confide/blob/master/src/views/generators/controller.blade.php) does exactly this.
    
#### Validating a route

If you want to validate whether a route exists, the `Confide::checkAction` function is what you are looking for.

Currently it is used within the views to determine Non-RESTful vs RESTful routes.

## Troubleshooting

__[Exception] SQLSTATE[HY000]: General error: 1364 Field 'confirmation_code' doesn't have a default value...__

If you overwrite the `beforeSave()` method in your model, make sure to call `parent::beforeSave()`:

    public function beforeSave( $forced = false ){

        parent::beforeSave( $forced) // Don't forget this

        // Your stuff
    }

__Confirmation link is not sent when user signup__

Same as above. If you overwrite the `afterSave()` method in your model, make sure to call `parent::afterSave()`:

__Users are able to login without confirming account__

If you want only confirmed users to login, in your `UserController`, instead of simply calling `logAttempt( $input )`, call `logAttempt( $input, true )`. The second parameter stands for _"confirmed_only"_.

## Release Notes

### Version 3.0.0
Updated to support Laravel 4.1

### Version 2.0.0 Beta 4
Removed deprecated variable and functions.
* $updateRules
* amend()
* generateUuid
* getUpdateRules
* prepareRules
* getRules
* setUpdateRules
* getUserFromCredsIdentity
* checkUserExists
* isConfirmed

Adds two config values
* login_cache_field (#161)
* throttle_time_period (#162)

### Version 2.0.0 Beta 3
Readme Update

### Version 2.0.0 Beta 2
Pulls in a few pull requests and also locks to Ardent 2.1.x
* Properly handles validation messaging (#124)
* Properly validates in real_save (#110)
* Auth redirect is handled using Redirect::guest instead of a custom session variable (#145)
* Bruteforce vulnerability is addressed. (#151)

### Version 2.0.0 Beta 2
Locked to Ardent 1.1.x

### Version 1.1.0

## License

Confide is free software distributed under the terms of the MIT license

## Aditional information

Any questions, feel free to contact me or ask [here](http://forums.laravel.io/viewtopic.php?id=4658)

Any issues, please [report here](https://github.com/Zizaco/confide/issues)
