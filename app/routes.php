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
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Comment Management
    Route::get('comments/{id}/edit', 'AdminCommentsController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('comments/{id}/edit', 'AdminCommentsController@postEdit')
        ->where('id', '[0-9]+')
        ->before('csrf');
    Route::get('comments/{id}/delete', 'AdminCommentsController@getDelete')
        ->where('id', '[0-9]+');
    Route::post('comments/{id}/delete', 'AdminCommentsController@postDelete')
        ->where('id', '[0-9]+')
        ->before('csrf');
    Route::controller('comments', 'AdminCommentsController');

    # Blog Management
    Route::get('blogs/{id}/show', 'AdminBlogsController@getShow')
        ->where('id', '[0-9]+');
    Route::get('blogs/{id}/edit', 'AdminBlogsController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('blogs/{id}/edit', 'AdminBlogsController@postEdit')
        ->where('id', '[0-9]+')
        ->before('csrf');
    Route::get('blogs/{id}/delete', 'AdminBlogsController@getDelete')
        ->where('id', '[0-9]+');
    Route::controller('blogs', 'AdminBlogsController');

    # User Management
    Route::get('users/{id}/show', 'AdminUsersController@getShow')
        ->where('id', '[0-9]+');
    Route::get('users/{id}/edit', 'AdminUsersController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('users/{id}/edit', 'AdminUsersController@postEdit')
        ->where('id', '[0-9]+')
        ->before('csrf');
    Route::get('users/{id}/delete', 'AdminUsersController@getDelete')
        ->where('id', '[0-9]+');
    Route::post('users/{id}/delete', 'AdminUsersController@postDelete')
        ->where('id', '[0-9]+')
        ->before('csrf');
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{id}/show', 'AdminRolesController@getShow')
        ->where('id', '[0-9]+');
    Route::get('roles/{id}/edit', 'AdminRolesController@getEdit')
        ->where('id', '[0-9]+');
    Route::post('roles/{id}/edit', 'AdminRolesController@postEdit')
        ->where('id', '[0-9]+')
        ->before('csrf');
    Route::get('roles/{id}/delete', 'AdminRolesController@getDelete')
        ->where('id', '[0-9]+');
    Route::controller('roles', 'AdminRolesController');

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

//:: User Account Routes ::

Route::group(array('before' => 'auth'), function()
{
    Route::get('user/settings', 'UserController@getSettings');
});
# User RESTful Routes (Login, Logout, Register, etc)
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


