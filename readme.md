#Laravel 4 Bootstrap Starter Site
`Version: 1.2.1 Stable` [![ProjectStatus](http://stillmaintained.com/andrew13/Laravel-4-Bootstrap-Starter-Site.png)](http://stillmaintained.com/andrew13/Laravel-4-Bootstrap-Starter-Site)
[![Build Status](https://api.travis-ci.org/Zizaco/confide.png)](https://travis-ci.org/andrew13/Laravel-4-Bootstrap-Starter-Site)

Laravel 4 Bootstrap Starter Site is a sample application for beginning development with Larvel 4.

<a name="features"></a>
## Features

* Twitter Bootstrap 2.3.0
* Font Awesome 3.2
* Custom Error Pages
	* 403 for forbidden page accesses
	* 404 for not found pages
	* 500 for internal server errors
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
    * [Confide](#confide) for Authentication and Authorization
    * [Entrust](#entrust) for Roles and Permissions
	* [Ardent](#ardent) for Validation
	* [Carbon](#carbon) for Human Readable Time
    * [Former](#former) for Awesome Forms
	* [Basset](#basset) for Asset Management
	* [Presenter](#presenter)
* Development packages included:
	* [Generators](#generators)
* [Vagrant](#vagrant) development environment

## Issues
See [github issue list](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/issues) for current list.

## Wiki
[Roadmap](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site/wiki/Roadmap)

-----

##Requirements

	PHP >= 5.4.0 (Entrust requires 5.4, this is an increase over Laravel's 5.3.7 requirement)
	MCrypt PHP Extension

##How to install

### Vagrant, or one setup to rule them all.

First get the right tools, [Vagrant v1.2.2](http://downloads.vagrantup.com/tags/v1.2.2) and [VirtualBox v4.2.12](https://www.virtualbox.org/wiki/Download_Old_Builds_4_2). You want these precious versions.
This project comes with an environement in `/bootstrap/start.php` configured for a Vagrant box that you can find [here](https://github.com/nekwebdev/vagrant-laravel4).

Here is the quick start for those that want to see the starter site running fast!

    git clone https://github.com/nekwebdev/vagrant-laravel4.git laravel-starter
    cd laravel-starter
    git clone https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site.git www
    vagrant up
    *** this may take a while, go grab a coffee, or two... ***
    vagrant ssh
    ./boot-starter.sh

Go to http://192.168.168.160 and enjoy your new laravel starter site running in a freshly setup Debian 7.0 RC1 environment with everything needed for Laravel 4!

Want to test registration email functionality?

    vagrant ssh
    pysmtpd

All outgoing emails from your application will display in the ssh session!

* For more info on this Vagrant box see our section on [Vagrant](#vagrant)
* For full usage see [Vagrant Documentation](http://http://docs.vagrantup.com/v2/)

Now for a more traditional setup:

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

Laravel 4 will load configuration files depending on your environment. Basset will also build collections depending on this environment setting.

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

    php artisan key:generate

Once you have generated your key, you might want to copy it over to your ***app/config/local/app.php*** local configuration file to have a different encryption key for each environment. A little tip, revert the key back to ***'YourSecretKey!!!'*** in ***app/config/app.php*** once you are done copying it. Now it can be generated again when you move the project to another environment.

### Step 8: Make sure app/storage is writable by your web server.

If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage

### Step 9: Build Assets

If you have setup your environments, basset will know you are in development and will build the assets automatically and will not apply certain filters such as minification or combination to keep the code readable. You will need to make the folder where the assets are built writable if you run into any `mkdir()` errors:

If permissions are set correctly:

    chmod -R 775 public/assets/compiled

Should work, if not try

    chmod -R 777 public/assets/compiled

To force a build of the dev collection use:

```
php artisan basset:build
```

The starter site uses two asset collections, ***public*** and ***admin***. While in development, assets will be built in two folders, ***public*** and ***admin***, inside of ***public/assets/compiled***. These are ignored by git as you do not want them on your production server. Once you are ready to push or upload the code to production run:

```
php artisan basset:build -p public
php artisan basset:build -p admin
```

This will build the production assets in ***public/assets/compiled*** which will be versioned in git and should be uploaded to your production server.

### Step 10: Start Page

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
## Troubleshooting

### Styles are not displaying

You may need to recompile the assets for basset. This is easy to with one command.

```
php artisan basset:build
```

-----
## Application Environments

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

-----
## Application Structure

The structure of this starter site is an extention of the default Laravel 4.

### Models

They all have a repository in charge of handling all the Eloquent ORM queries.

### Views

Views are split into 3 main parts:

* The main layout blade file which will in turn include a head layout file and yield sections to the template and final view.
* The template blade file is extending this layout and is in charge of setting various things:
    * The main Basset CSS and JS collections to use.
    * The meta information: title, keywords, author and description. Needed for good SEO.
    * The navigation and footer layouts to be used.
* The actual blade view called by the controller. It will fill the content section and extend a template.

It is important to keep as much logic out of the views as possible. But any logic related to the layout of the data itself still has a place in the views.

All of the needed data has to be sent by the controllers. Their job is to gather data from the models, or repositories in our case, and format it all to be displayed nicely by the views.

### Controllers

Controllers are namespaced according to their use. You will see two folders, admin and frontend.
Each will have similar controllers that will be the link between our routes, repositories and views.

-----
## Included Package Information
<a name="confide"></a>
## Confide Authentication Solution

Used for the user auth and registration. In general for user controllers you'll want to use something like the following:

    <?php

    use Zizaco\Confide\ConfideUser;

    class User extends ConfideUser {

    }

* For full usage see [Zizaco/Confide Documentation](https://github.com/zizaco/confide)
* Go back to [features list](#features).

<a name="entrust"></a>
## Entrust Role Solution

Entrust provides a flexible way to add Role-based Permissions to Laravel4.

    <?php

    use Zizaco\Entrust\EntrustRole;

    class Role extends EntrustRole
    {

    }

* For full usage see [Zizaco/Entrust Documentation](https://github.com/zizaco/entrust)
* Go back to [features list](#features).

<a name="ardent"></a>
## Ardent - Used for handling repetitive validation tasks.

Self-validating, secure and smart models for Laravel 4's Eloquent ORM

* For full usage see [Ardent Documentation](https://github.com/laravelbook/ardent)
* Go back to [features list](#features).

<a name="carbon"></a>
## Carbon

A fluent extension to PHPs DateTime class.

```php
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

* For full usage see [Carbon](https://github.com/briannesbitt/Carbon)
* Go back to [features list](#features).

<a name="former"></a>
## Former

Former aims to re-laravelize form creation by transforming each field into its own model, with its own methods and attributes. This means that you can do this sort of stuff :

```php
Former::horizontal_open()
  ->id('MyForm')
  ->secure()
  ->rules(array( 'name' => 'required' ))
  ->method('GET')

  Former::xlarge_text('name')
    ->class('myclass')
    ->value('Joseph')
    ->required();

  Former::textarea('comments')
    ->rows(10)->columns(20)
    ->autofocus();

  Former::actions()
    ->large_primary_submit('Submit'),
    ->large_inverse_reset('Reset')

Former::close()
```

* For full usage see [Anahkiasen/former Documentation](https://github.com/Anahkiasen/former)
* Go back to [features list](#features).

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

* For full usage see [Using Basset by Jason Lewis](http://jasonlewis.me/code/basset/4.0)
* Go back to [features list](#features).

<a name="presenter"></a>
## Presenter

Simple presenter to wrap and render objects. Think of it of a way to modify an asset for the view layer only.
Control the presentation in the presentation layer not in the model.

The core idea is the relationship between two classes: your model full of data and a presenter which works as a sort of wrapper to help with your views.
For instance, if you have a `User` object you might have a `UserPresenter` presenter to go with it. To use it all you do is `$userObject = new UserPresenter($userObject);`.
The `$userObject` will function the same unless a method is called that is a member of the `UserPresenter`. Another way to think of it is that any call that doesn't exist in the `UserPresenter` falls through to the original object.

* For full usage see [Presenter Readme](https://github.com/robclancy/presenter)
* Go back to [features list](#features).

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

* For full usage see [Laravel 4 Generators Readme](https://github.com/JeffreyWay/Laravel-4-Generators/blob/master/readme.md)
* Go back to [features list](#features).

-----
<a name="vagrant"></a>
## Vagrant

This project comes with a Vagrant development environment already setup.

Install [Vagrant v1.2.2](http://downloads.vagrantup.com/tags/v1.2.2) and [VirtualBox v4.2.12](https://www.virtualbox.org/wiki/Download_Old_Builds_4_2). You want these specific versions.

You have the option to use Vagrant instead of setting up a web server on your computer. First clone the Vagrant Laravel 4 project:

    git clone https://github.com/nekwebdev/vagrant-laravel4.git laravel-starter
    cd laravel-starter

Then clone the starter site project in the www folder.

    git clone https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site.git www

Start the Vagrant Virtual Machine.

    vagrant up

When you run it for the first time it will download a Debian 7.0 RC1 already bootstrapped for Puppet by the guys at PuppetLabs. Let it do it's thing (disregard the error messages) and you will have a virtual machine running Debian 7 RC1, Apache 2, PHP 5.4 and MySQL among other things needed for a Laravel 4 project to run.

Your project folder is synced to the /vagrant folder in the Vagrant VM. This means changes work both way, inside and outside the VM, you manipulate the same files.

Everything will already be configured, you only need to issue a few more commands. You have two options for doing so.

By doing `vagrant ssh` you will get a prompt from a session inside the VM Ubuntu and now you can `cd /vagrant` to be in your project root and run composer or artisan commands.

Another option is to pass commands directly via Vagrant like so:

    vagrant ssh -c 'cd /vagrant && composer install --dev'

The VM will already have the environment, databases and file permissions set.

There is a script you can run with `./boot-starter` from your home folder that will run composer install --dev and then php artisan migrate and db:seed for you to set it all up in one command.

On the host OS navigate to http://192.168.168.160 to see your site!

Here is a trick to test mail in this environment. Open a new vagrant ssh sessions and run `pysmtpd` which is a script that starts this command:

    sudo python -m smtpd -n -c DebuggingServer localhost:25

If you did not change the configurations in the ***app/config/vagrant*** folder created by Vagrant, when your application tries to send a email it will be displayed in this ssh session!

When you are done simply exit the ssh session and `vagrant suspend` to suspend the VM in it's current state until you need it again with `vagrant resume`

You can of course use this Vagrant Virtual Machine in other projects.

* For full usage see [Vagrant Documentation](http://http://docs.vagrantup.com/v2/)
* Go back to [features list](#features).

-----
## License

This is free software distributed under the terms of the MIT license

## Additional information

It began as a fork of [laravel4-starter-kit](https://github.com/brunogaspar/laravel4-starter-kit). 
We thank the contributors of that project for their contributions to the Laravel community.

Any questions, feel free to [contact me](http://twitter.com/andrewelkins).
