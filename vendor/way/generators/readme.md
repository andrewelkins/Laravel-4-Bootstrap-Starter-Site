# Fast Workflow in Laravel With Custom Generators

[![Build Status](https://travis-ci.org/JeffreyWay/Laravel-4-Generators.png?branch=master)](https://travis-ci.org/JeffreyWay/Laravel-4-Generators)

This Laravel 4 package provides a variety of generators to speed up your development process. These generators include:

- `generate:model`
- `generate:view`
- `generate:controller`
- `generate:seed`
- `generate:migration`
- `generate:pivot`
- `generate:resource`
- `generate:scaffold`

## Installation

> [Want a 5-minute video overview?](https://dl.dropboxusercontent.com/u/774859/Work/Laravel-4-Generators/Get-Started-With-Laravel-Custom-Generators.mp4)

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `way/generators`.

	"require-dev": {
		"way/generators": "2.*"
	}

> Please note that version 2 of this package removed support for a couple of generators, such as `generate:form`. If you'd like to continue using them, stick with version `1.1`.

Next, update Composer from the Terminal:

    composer update --dev

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Way\Generators\GeneratorsServiceProvider'

That's it! You're all set to go. Run the `artisan` command from the Terminal to see the new `generate` commands.

    php artisan

## Usage

Think of generators as an easy way to speed up your workflow. Rather than opening the models directory, creating a new file, saving it, and adding the class, you can simply run a single generate command.

- [Migrations](#migrations)
- [Models](#models)
- [Views](#views)
- [Seeds](#seeds)
- [Pivot](#pivot)
- [Resources](#resources)
- [Scaffolding](#scaffolding)
- [Configuration](#configuration)

### Migrations

Laravel 4 offers a migration generator, but it stops just short of creating the schema (or the fields for the table). Let's review a couple examples, using `generate:migration`.

    php artisan generate:migration create_posts_table

If we don't specify the `fields` option, the following file will be created within `app/database/migrations`.

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('posts');
	}

}

```

Notice that the generator is smart enough to detect that you're trying to create a table. When naming your migrations, make them as descriptive as possible. The migration generator will detect the first word in your migration name and do its best to determine how to proceed. As such, for `create_posts_table`, the keyword is "create," which means that we should prepare the necessary schema to create a table.

If you instead use a migration name along the lines of `add_user_id_to_posts_table`, in that case, the keyword is "add," signaling that we intend to add rows to an existing table. Let's see what that generates.

    php artisan generate:migration add_user_id_to_posts_table

This will prepare the following boilerplate:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUserIdToPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('posts', function(Blueprint $table) {

        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::table('posts', function(Blueprint $table) {

        });
	}

}
```

Notice how, this time, we're not doing `Schema::create`.

#### Keywords

When writing migration names, use the following keywords to provide hints for the generator.

- `create` or `make` (`create_users_table`)
- `add` or `insert` (`add_user_id_to_posts_table`)
- `remove` (`remove_user_id_from_posts_table`)
- `delete` or `drop` (`delete_users_table`)

#### Generating Schema

This is pretty nice, but let's take things a step further and also generate the schema, using the `fields` option.

    php artisan generate:migration create_posts_table --fields="title:string, body:text"

Before we decipher this new option, let's see the output:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
			$table->text('body');
			$table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('posts');
	}

}
```

Nice! A few things to notice here:

- The generator will automatically set the `id` as the primary key.
- It parsed the `fields` options, and added those fields.
- The drop method is smart enough to realize that, in reverse, the table should be dropped entirely.

To declare fields, use a comma+space-separated list of key:value:option sets, where `key` is the name of the field, `value` is the [column type](http://four.laravel.com/docs/schema#adding-columns), and `option` is a way to specify indexes and such, like `unique` or `nullable`. Here are some examples:

- `--fields="first:string, last:string"`
- `--fields="age:integer, yob:date"`
- `--fields="username:string:unique, age:integer:nullable"`
- `--fields="name:string:default('John Doe'), bio:text:nullable"`
- `--fields="username:string(30):unique, age:integer:nullable:default(18)"`

Please make note of the last example, where we specify a character limit: `string(30)`. This will produce `$table->string('username', 30)->unique();`

It is possible to destroy the table by issuing:

	php artisan generate:migration delete_posts_table

As a final demonstration, let's run a migration to remove the `completed` field from a `tasks` table.

    php artisan generate:migration remove_completed_from_tasks_table --fields="completed:boolean"

This time, as we're using the "remove" keyword, the generator understands that it should drop a column, and add it back in the `down()` method.

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveCompletedFromTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('tasks', function(Blueprint $table) {
            $table->dropColumn('completed');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::table('tasks', function(Blueprint $table) {
            $table->boolean('completed');
        });
	}

}
```

### Models

    php artisan generate:model Post

This will create the file, `app/models/Post.php` and insert the following boilerplate:

```php
<?php

class Post extends \Eloquent {

}
```

### Views

The view generator is fairly simple.

```bash
php artisan generate:view admin.reports.index
```

This command will create an empty view, `/app/views/admin/reports/index.blade.php`. If the provided directory tree does not exist, it will be created for you.

### Seeds

Laravel 4 provides us with a flexible way to seed new tables.

    php artisan generate:seed users

Set the argument to the name of the table that you'd like a seed file for. This will generate `app/database/seeds/UsersTableSeeder.php` and populate it with:

```php
<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            User::create([

            ]);
        }
    }

}
```

This will give you a basic bit of boilerplate, using the popular Faker library. This is a nice way to seed your DB tables. Don't forget to pull in Faker through Composer!

### Pivot

When you require a new pivot table, the `generate:pivot` table expedites the process of creating the appropriate migration.

Simply pass the name of the two tables that require a joining pivot table. For `orders` and `users`, you might do:

```bash
php artisan generate:pivot orders users
```

This will create the following migration:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('order_user', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('order_id')->unsigned()->index();
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('order_user');
	}

}
```

Notice that it correctly sets the table name according to your two provided tables, in alphabetical order. Now, run `php artisan migrate` to create your pivot table!

### Resources

The `generate:resource` command will do a number of things for you:

- Generate a model
- Generate index, show, create, and edit views
- Generate a controller
- Generate a migration with schema
- Generate a table seeder
- Migrate the database

When triggering this command, you'll be asked to confirm each of these actions. That way, you can tailor the generation to what you specifically require.

#### Example

Imagine that you need to build a way to display posts. While you could manually create a controller, create a model, create a migration and populate it with the schema, and then create a table seeder...why not let the generator do that?

```bash
php artisan generate:resource post --fields="title:string, body:text"
```

If you say yes to each confirmation, this single command will give you boilerplate for:

- app/models/Post.php
- app/controllers/PostsController.php
- app/database/migrations/timestamp-create_posts_table.php (including the schema)
- app/database/seeds/PostsTableSeeder.php

### Scaffolding

The scaffolding generator is similar to `generate:resource`, except it will add some beginning boilerplate to these files, as a convenience.

For instance, when running `generate:scaffold post`, your controller boilerplate will be:

```php
<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function index()
	{
	    $posts = Post::all();

	    return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('posts.create');
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $validator = Validator::make($data = Input::all(), Post::$rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput();
	    }

	    Post::create($data);

	    return Redirect::route('posts.index');
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	    $post = Post::findOrFail($id);

	    return View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$post->update($data);

		return Redirect::route('posts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::destroy($id);

		return Redirect::route('posts.index');
	}

}
```

Please note that you're encouraged to modify this generated controller. It simply provides a starting point.

### Configuration

You may want to modify your templates - how the generated files are formatted. To allow for this, you
need to publish the templates that, behind the scenes, the generators will reference.

```bash
php artisan generate:publish-templates
```

This will copy all templates to your `app/templates` directory. You can modify these however you wish to fit your desired formatting. If you'd prefer a different directory:

```bash
php artisan generate:publish-templates --path=app/foo/bar/templates
```

When you run the `generate:publish-templates` command, it will also publish
the configuration to `app/config/packages/way/generators/config/config.php`. This file will look somewhat like:

```php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Where the templates for the generators are stored...
    |--------------------------------------------------------------------------
    |
    */
    'model_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/model.txt',

    'scaffold_model_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/scaffolding/model.txt',

    'controller_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/controller.txt',

    'scaffold_controller_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/scaffolding/controller.txt',

    'migration_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/migration.txt',

    'seed_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/seed.txt',

    'view_template_path' => '/Users/jeffreyway/Desktop/generators-testing/app/templates/view.txt',


    /*
    |--------------------------------------------------------------------------
    | Where the generated files will be saved...
    |--------------------------------------------------------------------------
    |
    */
    'model_target_path'   => app_path('models'),

    'controller_target_path'   => app_path('controllers'),

    'migration_target_path'   => app_path('database/migrations'),

    'seed_target_path'   => app_path('database/seeds'),

    'view_target_path'   => app_path('views')

];
```

Also, while you're in this file, note that you can also update the default target directory for each generator.

### Shortcuts

Because you'll likely type these commands over and over, it makes sense to create aliases.

```bash
# Generator Stuff
alias g:m="php artisan generate:model"
alias g:c="php artisan generate:controller"
alias g:v="php artisan generate:view"
alias g:s="php artisan generate:seed"
alias g:mig="php artisan generate:migration"
alias g:r="php artisan generate:resource"
```

These can be stored in, for example, your `~/.bash_profile` or `~/.bashrc` files.