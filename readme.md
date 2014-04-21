#Laravel 4 Bootstrap Starter Site
`Version: 1.3.0 Stable` [![ProjectStatus](http://stillmaintained.com/andrew13/Laravel-4-Bootstrap-Starter-Site.png)](http://stillmaintained.com/andrew13/Laravel-4-Bootstrap-Starter-Site)
[![Build Status](https://api.travis-ci.org/andrew13/Laravel-4-Bootstrap-Starter-Site.png)](https://travis-ci.org/andrew13/Laravel-4-Bootstrap-Starter-Site)
[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/andrew13/laravel-4-bootstrap-starter-site/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

Laravel 4 Bootstrap Starter Site is a sample application for beginning development with Laravel 4.

## Features

* Bootstrap 3.x
* Custom Error Pages
	* 403 for forbidden page accesses
	* 404 for not found pages
	* 500 for internal server errors
* Confide for Authentication and Authorization
* Back-end
	* User and Role management
	* Manage blog posts and comments
	* WYSIWYG editor for post creation and editing.
    * DataTables dynamic table sorting and filtering.
    * Colorbox Lightbox jQuery modal popup.
* Front-end
	* User login, registration, forgot password
	* User account area
	* Simple Blog functionality
* Packages included:
	* [Confide](https://github.com/zizaco/confide)
	* [Entrust](https://github.com/zizaco/entrust)
	* [Ardent](https://github.com/laravelbook/ardent)
	* [Generators](https://github.com/JeffreyWay/Laravel-4-Generators/blob/master/readme.md)

## Issues
See [github issue list](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues) for current list.

## Recommendations
I recommend that you use Grunt to compile and minify your assets. See this [article](http://blog.elenakolevska.com/using-grunt-with-laravel-and-bootstrap) for details.

Also I recommend using [Former](http://anahkiasen.github.io/former/) for your forms. It's an excellent library.

-----

##Requirements

	PHP >= 5.4.0
	MCrypt PHP Extension

##How to install
### Step 1: Get the code
#### Option 1: Git Clone

	git clone git://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site.git laravel

#### Option 2: Download the repository

    https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/archive/master.zip

### Step 2: Use Composer to install dependencies
#### Option 1: Composer is not installed globally

    cd laravel
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev
#### Option 2: Composer is installed globally

    cd laravel
	composer install --dev

If you haven't already, you might want to make [composer be installed globally](http://andrewelkins.com/programming/php/setting-up-composer-globally-for-laravel-4/) for future ease of use.

Please note the use of the `--dev` flag.

Some packages used to preprocess and minify assests are required on the development environment.

When you deploy your project on a production environment you will want to upload the ***composer.lock*** file used on the development environment and only run `php composer.phar install` on the production server.

This will skip the development packages and ensure the version of the packages installed on the production server match those you developped on.

NEVER run `php composer.phar update` on your production server.

### Step 3: Configure Environments

Open ***bootstrap/start.php*** and edit the following lines to match your settings. You want to be using your machine name in Windows and your hostname in OS X and Linux (type `hostname` in terminal). Using the machine name will allow the `php artisan` command to use the right configuration files as well.

    $env = $app->detectEnvironment(array(

        'local' => array('your-local-machine-name'),
        'staging' => array('your-staging-machine-name'),
        'production' => array('your-production-machine-name'),

    ));

Now create the folder inside ***app/config*** that corresponds to the environment the code is deployed in. This will most likely be ***local*** when you first start a project.

You will now be copying the initial configuration file inside this folder before editing it. Let's start with ***app/config/app.php***. So ***app/config/local/app.php*** will probably look something like this, as the rest of the configuration can be left to their defaults from the initial config file:

    <?php

    return array(

        'url' => 'http://myproject.local',

        'timezone' => 'UTC',

        'key' => 'YourSecretKey!!!',

        'providers' => array(
        
        [... Removed ...]
        
        /* Uncomment for use in development */
    //     'Way\Generators\GeneratorsServiceProvider', // Generators
    //     'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', // IDE Helpers

        ),

    );

### Step 4: Configure Database

Now that you have the environment configured, you need to create a database configuration for it. Copy the file ***app/config/database.php*** in ***app/config/local*** and edit it to match your local database settings. You can remove all the parts that you have not changed as this configuration file will be loaded over the initial one.

### Step 5: Configure Mailer

In the same fashion, copy the ***app/config/mail.php*** configuration file in ***app/config/local/mail.php***. Now set the `address` and `name` from the `from` array in ***config/mail.php***. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

### Step 6: Populate Database
Run these commands to create and populate Users table:

	php artisan migrate
	php artisan db:seed

### Step 7: Set Encryption Key
***In app/config/app.php***

```
/*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| This key is used by the Illuminate encrypter service and should be set
| to a random, long string, otherwise these encrypted values will not
| be safe. Make sure to change it before deploying any application!
|
*/
```

	'key' => 'YourSecretKey!!!',

You can use artisan to do this

    php artisan key:generate --env=local

The `--env` option allows defining which environment you would like to apply the key generation. In our case, artisan generates your key in ***app/config/local/app.php*** and leaves ***'YourSecretKey!!!'*** in ***app/config/app.php***. Now it can be generated again when you move the project to another environment.

### Step 8: Make sure app/storage is writable by your web server.

If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage

### Step 9: Start Page (Three options for proceeding)

### User login with commenting permission
Navigate to your Laravel 4 website and login at /user/login:

    username : user
    password : user

## Create a new user
Create a new user at /user/create

### Admin login
Navigate to /admin

    username: admin
    password: admin

-----
## Application Structure

The structure of this starter site is the same as default Laravel 4 with one exception.
This starter site adds a `library` folder. Which, houses application specific library files.
The files within library could also be handled within a composer package, but is included here as an example.

## Detect Language

If you want to detect teh language on all pages you'll want to add the following to your routes.php at the top.

    Route::when('*','detectLang');


### Development

For ease of development you'll want to enable a couple useful packages. This requires editing the `app/config/app.php` file.

```
    'providers' => array(

        [...]

        /* Uncomment for use in development */
//        'Way\Generators\GeneratorsServiceProvider', // Generators
//        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider', // IDE Helpers

    ),
```
Uncomment the Generators and IDE Helpers. Then you'll want to run a composer update with the dev flag.

```
php composer.phar update
```
This adds the generators and ide helpers.
To make it build the ide helpers automatically you'll want to modify the post-update-cmd in `composer.json`

```
		"post-update-cmd": [
			"php artisan ide-helper:generate",
			"php artisan optimize"
		]
```

### Production Launch

By default debugging is enabled. Before you go to production you should disable debugging in `app/config/app.php`

```
    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => false,
```

## Troubleshooting

## Composer asking for login / password

Try using this with doing the install instead.

    composer install --dev --prefer-source --no-interaction

## License

This is free software distributed under the terms of the MIT license

## Additional information

Inspired by and based on [laravel4-starter-kit](https://github.com/brunogaspar/laravel4-starter-kit)

Any questions, feel free to [contact me](http://twitter.com/andrewelkins).
