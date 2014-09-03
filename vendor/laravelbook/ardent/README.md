#Ardent

Self-validating smart models for Laravel Framework 4's Eloquent O/RM.

Based on the Aware bundle for Laravel 3 by Colby Rabideau.

Copyright (C) 2013 Max Ehsan <[http://laravelbook.com/](http://laravelbook.com/)>

## Installation

Add `laravelbook/ardent` as a requirement to `composer.json`:

```javascript
{
    "require": {
        "laravelbook/ardent": "dev-master"
    }
}
```

Update your packages with `composer update` or install with `composer install`.

You can also add the package using `composer require laravelbook/ardent` and later specifying the version you want (for now, `dev-master` is your best bet).

### Usage outside of Laravel (since [1.1](https://github.com/laravelbook/ardent/tree/v1.1.0))

If you're willing to use Ardent as a standalone ORM package you're invited to do so by using the
following configuration line in your project's boot/startup file (changing the properties according
to your database, obviously):

```php
\LaravelBook\Ardent\Ardent::configureAsExternal(array(
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'port'      => 3306,
  'database'  => 'my_system',
  'username'  => 'myself',
  'password'  => 'h4ckr',
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci'
));
```

## Documentation

* [Introduction](#intro)
* [Getting Started](#start)
* [Effortless Validation with Ardent](#validation)
* [Retrieving Validation Errors](#errors)
* [Overriding Validation](#override)
* [Custom Validation Error Messages](#messages)
* [Custom Validation Rules](#rules)
* [Model hooks](#modelhooks)
* [Cleaner definition of relationships](#relations)
* [Automatically Hydrate Ardent Entities](#hydra)
* [Automatically Purge Redundant Form Data](#purge)
* [Automatically Transform Secure-Text Attributes](#secure)
* [Updates with Unique Rules] (#uniquerules)

<a name="start"></a>
## Introduction

How often do you find yourself re-creating the same boilerplate code in the applications you build? Does this typical form processing code look all too familiar to you?

```php
Route::post('register', function() {
        $rules = array(
            'name'                  => 'required|min:3|max:80|alpha_dash',
            'email'                 => 'required|between:3,64|email|unique:users',
            'password'              => 'required|alpha_num|between:4,8|confirmed',
            'password_confirmation' => 'required|alpha_num|between:4,8'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            User::create(array(
                    'name'     => Input::get('name'),
                    'email'    => Input::get('email'),
                    'password' => Hash::make(Input::get('password'))
                ));

            return Redirect::to('/')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::to('/')->withErrors($validator->getMessages());
        }
    }
);
```

Implementing this yourself often results in a lot of repeated boilerplate code. As an added bonus, you controllers (or route handlers) get prematurely fat, and your code becomes messy, ugly and difficult to understand.

What if someone else did all the heavy-lifting for you? What if, instead of regurgitating the above mess, all you needed to type was these few lines?...

```php
Route::post('register', function() {
        $user = new User;
        if ($user->save()) {
            return Redirect::to('/')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::to('/')->withErrors($user->errors());
        }
    }
);
```

**Enter Ardent!** 

**Ardent** - the magic-dust-powered, wrist-friendly, one-stop solution to all your dreary input sanitization boilerplates!

Puns aside, input validation functionality can quickly become tedious to write and maintain. Ardent deals away with these complexities by providing helpers for automating many repetitive tasks.

Ardent is not just great for input validation, though - it will help you significantly reduce your Eloquent data model code. Ardent is particularly useful if you find yourself wearily writing very similar code time and again in multiple individual applications.

For example, user registration or blog post submission is a common coding requirement that you might want to implement in one application and reuse again in other applications. With Ardent, you can write your *self-aware, smart* models just once, then re-use them (with no or very little modification) in other projects. Once you get used to this way of doing things, you'll honestly wonder how you ever coped without Ardent.

**No more repetitive brain strain injury for you!**

<a name="start"></a>
## Getting Started

`Ardent` aims to extend the `Eloquent` base class without changing its core functionality. Since `Ardent` itself is a descendant of `Illuminate\Database\Eloquent\Model`, all your `Ardent` models are fully compatible with `Eloquent` and can harness the full power of Laravels awesome OR/M.

To create a new Ardent model, simply make your model class derive from the `Ardent` base class. In the next examples we will use the complete namespaced class to make examples cleaner, but you're encouraged to make use of `use` in all your classes:

```php
use LaravelBook\Ardent\Ardent;

class User extends Ardent {}
```

> **Note:** You can freely *co-mingle* your plain-vanilla Eloquent models with Ardent descendants. If a model object doesn't rely upon user submitted content and therefore doesn't require validation - you may leave the Eloquent model class as it is.

<a name="validation"></a>
## Effortless Validation with Ardent

Ardent models use Laravel's built-in [Validator class](http://four.laravel.com/docs/validation). Defining validation rules for a model is simple and is typically done in your model class as a static variable:

```php
class User extends \LaravelBook\Ardent\Ardent {
  public static $rules = array(
    'name'                  => 'required|between:4,16',
    'email'                 => 'required|email',
    'password'              => 'required|alpha_num|between:4,8|confirmed',
    'password_confirmation' => 'required|alpha_num|between:4,8',
  );
}
```

> **Note**: you're free to use the [array syntax](http://four.laravel.com/docs/validation#basic-usage) for validation rules as well.

Ardent models validate themselves automatically when `Ardent->save()` is called.

```php
$user           = new User;
$user->name     = 'John doe';
$user->email    = 'john@doe.com';
$user->password = 'test';

$success = $user->save(); // returns false if model is invalid
```

> **Note:** You can also validate a model at any time using the `Ardent->validate()` method.

<a name="errors"></a>
## Retrieving Validation Errors

When an Ardent model fails to validate, a `Illuminate\Support\MessageBag` object is attached to the Ardent object which contains validation failure messages.

Retrieve the validation errors message collection instance with `Ardent->errors()` method or `Ardent->validationErrors` property.

Retrieve all validation errors with `Ardent->errors()->all()`. Retrieve errors for a *specific* attribute using `Ardent->validationErrors->get('attribute')`.

> **Note:** Ardent leverages Laravel's MessagesBag object which has a [simple and elegant method](http://four.laravel.com/docs/validation#working-with-error-messages) of formatting errors.

<a name="overide"></a>
## Overriding Validation

There are two ways to override Ardent's validation:

#### 1. Forced Save
`forceSave()` validates the model but saves regardless of whether or not there are validation errors.

#### 2. Override Rules and Messages
both `Ardent->save($rules, $customMessages)` and `Ardent->validate($rules, $customMessages)` take two parameters:

- `$rules` is an array of Validator rules of the same form as `Ardent::$rules`.
- The same is true of the `$customMessages` parameter (same as `Ardent::$customMessages`)

An array that is **not empty** will override the rules or custom error messages specified by the class for that instance of the method only.

> **Note:** the default value for `$rules` and `$customMessages` is empty `array()`; thus, if you pass an `array()` nothing will be overriden.

<a name="messages"></a>
## Custom Error Messages

Just like the Laravel Validator, Ardent lets you set custom error messages using the [same syntax](http://four.laravel.com/docs/validation#custom-error-messages).

```php
class User extends \LaravelBook\Ardent\Ardent {
  public static $customMessages = array(
    'required' => 'The :attribute field is required.',
    ...
  );
}
```

<a name="rules"></a>
## Custom Validation Rules

You can create custom validation rules the [same way](http://four.laravel.com/docs/validation#custom-validation-rules) you would for the Laravel Validator.

<a name="hydra"></a>
## Automatically Hydrate Ardent Entities

Ardent is capable of hydrating your entity model class from the form input submission automatically! 

Let's see it action. Consider this snippet of code:

```php
$user           = new User;
$user->name     = Input::get('name');
$user->email    = Input::get('email');
$user->password = Hash::make(Input::get('password'));
$user->save();
```

Let's invoke the *magick* of Ardent and rewrite the previous snippet:

```php
$user = new User;
$user->save();
```

That's it! All we've done is remove the boring stuff.

Believe it or not, the code above performs essentially the same task as its older, albeit rather verbose sibling. Ardent populates the model object with attributes from user submitted form data. No more hair-pulling trying to find out which Eloquent property you've forgotten to populate. Let Ardent take care of the boring stuff, while you get on with the fun stuffs!  
It follows the same [mass assignment rules](http://four.laravel.com/docs/eloquent#mass-assignment) internally, depending on the `$fillable`/`$guarded` properties.

To enable the auto-hydration feature, simply set the `$autoHydrateEntityFromInput` instance variable to `true` in your model class. However, to prevent filling pre-existent properties, if you want auto-hydration also for update scenarios, you should use instead `$forceEntityHydrationFromInput`:

```php
class User extends \LaravelBook\Ardent\Ardent {
  public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
  public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
}
```

<a name="modelhooks"></a>
## Model Hooks (since [2.0](https://github.com/laravelbook/ardent/tree/v2.0.0))

Ardent provides some syntatic sugar over Eloquent's model events: traditional model hooks. They are an easy way to hook up additional operations to different moments in your model life. They can be used to do additional clean-up work before deleting an entry, doing automatic fixes after validation occurs or updating related models after an update happens.

All `before` hooks, when returning `false` (specifically boolean, not simply "falsy" values) will halt the operation. So, for example, if you want to stop saving if something goes wrong in a `beforeSave` method, just `return false` and the save will not happen - and obviously `afterSave` won't be called as well.

Here's the complete list of available hooks:

- `before`/`afterCreate()`
- `before`/`afterSave()`
- `before`/`afterUpdate()`
- `before`/`afterDelete()`
- `before`/`afterValidate()` - when returning false will halt validation, thus making `save()` operations fail as well since the validation was a failure.

For example, you may use `beforeSave` to hash a users password:

```php
class User extends \LaravelBook\Ardent\Ardent {
  public function beforeSave() {
    // if there's a new password, hash it
    if($this->isDirty('password')) {
      $this->password = Hash::make($this->password);
    }
    
    return true;
    //or don't return nothing, since only a boolean false will halt the operation
  }
}
```

### Additionals beforeSave and afterSave (since 1.0)

`beforeSave` and `afterSave` can be included at run-time. Simply pass in closures with the model as argument to the `save()` (or `forceSave()`) method.

```php
$user->save(array(), array(), array(),
  function ($model) { // closure for beforeSave
    echo "saving the model object...";
    return true;
  },
  function ($model) { // closure for afterSave
    echo "done!";
  }
);
```

> **Note:** the closures should have one parameter as it will be passed a reference to the model being saved.

<a name="relations"></a>
## Cleaner definition of relationships  (since [2.0](https://github.com/laravelbook/ardent/tree/v2.0.0))

Have you ever written an Eloquent model with a bunch of relations, just to notice how cluttered your class is, with all those one-liners that have almost the same content as the method name itself?

In Ardent you can cleanly define your relationships in an array with their information, and they will work just like if you had defined they in methods. Here's an example:

```php
class User extends \LaravelBook\Ardent\Ardent {
  public static $relationsData = array(
    'address' => array(self::HAS_ONE, 'Address'),
    'orders'  => array(self::HAS_MANY, 'Order'),
    'groups'  => array(self::BELONGS_TO_MANY, 'Group', 'table' => 'groups_have_users')
  );
}

$user = User::find($id);
echo "{$user->address->street}, {$user->address->city} - {$user->address->state}";
```

The array syntax is as follows:

- First indexed value: relation name, being one of
[`hasOne`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_hasOne),
[`hasMany`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_hasMany),
[`belongsTo`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_belongsTo),
[`belongsToMany`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_belongsToMany),
[`morphTo`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_morphTo),
[`morphOne`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_morphOne),
[`morphMany`](http://laravel.com/api/class-Illuminate.Database.Eloquent.Model.html#_morphMany),
or one of the related constants (`Ardent::HAS_MANY` or `Ardent::MORPH_ONE` for example).
- Second indexed: class name, with complete namespace. The exception is `morphTo` relations, that take no additional argument.
- named arguments, following the ones defined for the original Eloquent methods:
    - `foreignKey` [optional], valid for `hasOne`, `hasMany`, `belongsTo` and `belongsToMany`
    - `table`,`otherKey` [optional],`timestamps` [boolean, optional], and `pivotKeys` [array, optional], valid for `belongsToMany`
    - `name`, `type` and `id`, used by `morphTo`, `morphOne` and `morphMany` (the last two requires `name` to be defined)
    
> **Note:** This feature was based on the easy [relations on Yii 1.1 ActiveRecord](http://www.yiiframework.com/doc/guide/1.1/en/database.arr#declaring-relationship).

<a name="purge"></a>
## Automatically Purge Redundant Form Data

Ardent models can *auto-magically* purge redundant input data (such as *password confirmation* fields) - so that the extra data is never saved to database. Ardent will use the confirmation fields to validate form input, then prudently discard these attributes before saving the model instance to database!

To enable this feature, simply set the `$autoPurgeRedundantAttributes` instance variable to `true` in your model class:

```php
class User extends \LaravelBook\Ardent\Ardent {
  public $autoPurgeRedundantAttributes = true;
}
```

You can also purge additional fields. The attribute `Ardent::$purgeFilters` is an array of closures to which you can add your custom rules. Those closures receive the attribute key as argument and should return `false` for attributes that should be purged. Like this:

```php
function __construct($attributes = array()) {
  parent::__construct($attributes);

  $this->purgeFilters[] = function($key) {
    $purge = array('tempData', 'myAttribute');
    return ! in_array($key, $purge);
  };
}
```
<a name="secure"></a>
## Automatically Transform Secure-Text Attributes

Suppose you have an attribute named `password` in your model class, but don't want to store the plain-text version in the database. The pragmatic thing to do would be to store the hash of the original content. Worry not, Ardent is fully capable of transmogrifying any number of secure fields automatically for you!

To do that, add the attribute name to the `Ardent::$passwordAttributes` static array variable in your model class, and set the `$autoHashPasswordAttributes` instance variable to `true`:

```php
class User extends \LaravelBook\Ardent\Ardent {
  public static $passwordAttributes  = array('password');
  public $autoHashPasswordAttributes = true;
}
```

Ardent will automatically replace the plain-text password attribute with secure hash checksum and save it to database. It uses the Laravel `Hash::make()` method internally to generate hash.

<a name="uniquerules"></a>
## Updates with Unique Rules

Ardent can assist you with unique updates. According to the Laravel Documentation, when you update (and therefore validate) a field with a unique rule, you have to pass in the unique ID of the record you are updating. Without passing this ID, validation will fail because Laravel's Validator will think this record is a duplicate.

From the Laravel Documentation:

```php
    'email' => 'unique:users,email,10'
```

In the past, programmers had to manually manage the passing of the ID and changing of the ruleset to include the ID at runtime. Not so with Ardent. Simply set up your rules with `unique`, call function `updateUniques` and Ardent will take care of the rest.

#### Example:

In your extended model define your rules

```php
  public static $rules = array(
     'email' => 'required|email|unique',
     'password' => 'required|between:4,20|confirmed',
     'password_confirmation' => 'between:4,20',
  );
```

In your controller, when you need to update, simply call

```php
$model->updateUniques();
```

If required, you can runtime pass rules to `updateUniques`, otherwise it will use the static rules provided by your model.

Note that in the above example of the rules, we did not tell the Validator which table or even which field to use as it is described in the Laravel Documentation (ie `unique:users,email,10`). Ardent is clever enough to figure it out. (Thank you to github user @Sylph)

