<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

# Blog Management
Route::resource('admin/blogs', 'AdminBlogsController');

# User Management
Route::resource('admin/users', 'AdminUsersController');

# Group Management
Route::resource('admin/groups', 'AdminGroupsController');

# Admin Dashboard
Route::controller('admin', 'AdminDashboardController');

/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

//:: User Account Routes ::
//:: User RESTful Routes (Includes Authentication and Authorization) ::

# Settings
Route::controller('user/settings', 'UserSettingsController');

# User RESTful Routes for everything else
Route::controller('user', 'UserController');

//:: Application Routes ::

# Contact Us Static Page
Route::get('contact-us', function()
{
    // Return about us page
    return View::make('site/contact-us');
});

# Posts - Second to last set, match slug
Route::get('{postSlug}', 'BlogController@getView');
Route::post('{postSlug}', 'BlogController@postView');

# Index Page - Last route, no matches
//Route::get('/', 'HomeController@showIndex');
Route::get('/', 'BlogController@getIndex');


