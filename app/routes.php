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
Route::group(array('prefix' => 'admin'), function()
{

    # Blog Management
    Route::get('blogs/{id}/show', 'AdminBlogsController@getShow')
        ->where('id', '[0-9]+');
    Route::get('blogs/{id}/edit', 'AdminBlogsController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('blogs/{id}/edit', 'AdminBlogsController@postEdit')
        ->where('id', '[0-9]+');
    Route::post('blogs/{id}/delete', 'AdminBlogsController@postDelete')
        ->where('id', '[0-9]+');
    Route::controller('blogs', 'AdminBlogsController');

    # User Management
    Route::get('users/{id}/show', 'AdminUsersController@getShow')
        ->where('id', '[0-9]+');
    Route::get('users/{id}/edit', 'AdminUsersController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('users/{id}/edit', 'AdminUsersController@postEdit')
        ->where('id', '[0-9]+');
    Route::post('users/{id}/delete', 'AdminUsersController@postDelete')
        ->where('id', '[0-9]+');
    Route::controller('users', 'AdminUsersController');

    # User Group Management
    Route::get('groups/{id}/show', 'AdminGroupsController@getShow')
        ->where('id', '[0-9]+');
    Route::get('groups/{id}/edit', 'AdminGroupsController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('groups/{id}/edit', 'AdminGroupsController@postEdit')
        ->where('id', '[0-9]+');
    Route::post('groups/{id}/delete', 'AdminGroupsController@postDelete')
        ->where('id', '[0-9]+');
    Route::controller('groups', 'AdminGroupsController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

//:: User Account Routes ::

# User RESTful Routes (Includes Authentication, Authorization and Settings)
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
Route::get('/', 'BlogController@getIndex');


