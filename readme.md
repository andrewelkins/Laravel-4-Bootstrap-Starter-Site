#Laravel 4 Bootstrap Starter Site 
`Version: 1.2.1 Stable` [![ProjectStatus](http://stillmaintained.com/andrew13/Laravel-4-Bootstrap-Starter-Site.png)](http://stillmaintained.com/andrew13/Laravel-4-Bootstrap-Starter-Site)
[![Build Status](https://api.travis-ci.org/Zizaco/confide.png)](https://travis-ci.org/andrew13/Laravel-4-Bootstrap-Starter-Site)

Laravel 4 Bootstrap Starter Site is a sample application for beginning development with Larvel 4. 

It began as a fork of [laravel4-starter-kit](https://github.com/brunogaspar/laravel4-starter-kit) taking the starter kit changing the included modules and adding a few as well.


## Features

* Twitter Bootstrap 2.3.0
* Custom Error Pages
	* 403 for forbidden page accesses
	* 404 for not found pages
	* 500 for internal server errors
* [Confide](#confide) for Authentication and Authorization
* Back-end
	* User and Role management
	* Manage blog posts and comments
	* WYSIWYG editor for post creation and editing.
* Front-end
	* User login, registration, forgot password
	* User account area
	* Simple Blog functionality
* Packages included:
	* [Confide](#confide)
	* [Entrust](#entrust)
	* [Ardent](#ardent)
	* [Carbon](#carbon)
	* [Basset](#basset)
	* [Presenter](#presenter)
	* [Generators](#generators)

## Issues
See [github issue list](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues) for current list.

## Wiki
[Roadmap](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/wiki/Roadmap) 

-----

##Requirements

	PHP >= 5.4.0 (Entrust requires 5.4, this is an increase over Laravel's 5.3.7 requirement)
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
	php composer.phar install
#### Option 2: Composer is installed globally

    cd laravel
	composer install

If you haven't already, you might want to make [composer be installed globally](http://andrewelkins.com/programming/php/setting-up-composer-globally-for-laravel-4/) for future ease of use.

### Step 3: Configure Database

Now that you have the Laravel 4 installed, you need to create a database for it and update the file ***app/config/database.php***

### Step 4: Configure Mailer

Set the `address` and `name` from the `from` array in ***config/mail.php***. Those will be used to send account confirmation and password reset emails to the users.
If you don't set that registration will fail because it cannot send the confirmation email.

### Step 5: Populate Database
Run these commands to create and populate Users table:

	php artisan migrate
	php artisan db:seed

### Step 6: Set Encyrption Key
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

    php artisan key:generate


### Step 7: Make sure app/storage is writable by your web server.
If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage

## Step 8: Start Page
### User login with commenting permission
Navigate to your Laravel 4 website and login at /user/login:

    username : user
    password : user

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
			"php artisan optimize",
            "php artisan ide-helper:generate"
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

### Styles are not displaying

You may need to recompile the assets for basset. This is easy to with one command.

```
php artisan basset:build
```

-----
## Included Package Information
<a name="confide"></a>
## Confide Authentication Solution

Used for the user auth and registration. In general for user controllers you'll want to use something like the following:

    <?php

    use Zizaco\Confide\ConfideUser;

    class User extends ConfideUser {

    }

For full usage see [Zizaco/Confide Documentation](https://github.com/zizaco/confide)

<a name="entrust"></a>
## Entrust Role Solution

Entrust provides a flexible way to add Role-based Permissions to Laravel4.

    <?php

    use Zizaco\Entrust\EntrustRole;
    
    class Role extends EntrustRole
    {
    
    }

For full usage see [Zizaco/Entrust Documentation](https://github.com/zizaco/entrust)

<a name="ardent"></a>
## Ardent - Used for handling repetitive validation tasks.

Self-validating, secure and smart models for Laravel 4's Eloquent ORM 

For full usage see [Ardent Documentation](https://github.com/laravelbook/ardent) 

<a name="carbon"></a>
## Carbon

A fluent extension to PHPs DateTime class.

```php
<?php
printf("Right now is %s", Carbon::now()->toDateTimeString());
printf("Right now in Vancouver is %s", Carbon::now('America/Vancouver'));  //implicit __toString()
$tomorrow = Carbon::now()->addDay();
$lastWeek = Carbon::now()->subWeek();
$nextSummerOlympics = Carbon::createFromDate(2012)->addYears(4);

$officialDate = Carbon::now()->toRFC2822String();

$howOldAmI = Carbon::createFromDate(1975, 5, 21)->age;

$noonTodayLondonTime = Carbon::createFromTime(12, 0, 0, 'Europe/London');

$worldWillEnd = Carbon::createFromDate(2012, 12, 21, 'GMT');
```

For full usage see [Carbon](https://github.com/briannesbitt/Carbon)

<a name="basset"></a>
## Basset

A Better Asset Management package for Laravel.

Adding assets in the configuration file `config/packages/jasonlewis/basset/config.php`
```php
'collections' => array(
        'public-css' => function($collection)
        {
            $collection->add('assets/css/bootstrap.min.css');
            $collection->add('assets/css/bootstrap-responsive.min.css');
        },
    ),
```

Compiling assets

    $ php artisan basset:build

I would recommend using development collections for development instead of compiling .

For full usage see [Using Basset by Jason Lewis](http://jasonlewis.me/code/basset/4.0)

<a name="presenter"></a>
## Presenter

Simple presenter to wrap and render objects. Think of it of a way to modify an asset for the view layer only.
Control the presentation in the presentation layer not in the model.

The core idea is the relationship between two classes: your model full of data and a presenter which works as a sort of wrapper to help with your views.
For instance, if you have a `User` object you might have a `UserPresenter` presenter to go with it. To use it all you do is `$userObject = new UserPresenter($userObject);`.
The `$userObject` will function the same unless a method is called that is a member of the `UserPresenter`. Another way to think of it is that any call that doesn't exist in the `UserPresenter` falls through to the original object.

For full usage see [Presenter Readme](https://github.com/robclancy/presenter)

<a name="generators"></a>
## Laravel 4 Generators

Laravel 4 Generators package provides a variety of generators to speed up your development process. These generators include:

- `generate:model`
- `generate:seed`
- `generate:test`
- `generate:view`
- `generate:migration`
- `generate:resource`
- `generate:scaffold` 
- `generate:form` 
- `generate:test` 

For full usage see [Laravel 4 Generators Readme](https://github.com/JeffreyWay/Laravel-4-Generators/blob/master/readme.md)


-----
## License

This is free software distributed under the terms of the MIT license

## Additional information

Inspired by and based on [laravel4-starter-kit](https://github.com/brunogaspar/laravel4-starter-kit)

Any questions, feel free to [contact me](http://twitter.com/andrewelkins).
