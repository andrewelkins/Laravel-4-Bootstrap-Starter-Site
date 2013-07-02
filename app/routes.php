<?php

/*
|--------------------------------------------
|  Interface repository binding
|--------------------------------------------
*/
App::bind('UserRepositoryInterface', 'EloquentUserRepository');
App::bind('RoleRepositoryInterface', 'EloquentRoleRepository');
App::bind('PostRepositoryInterface', 'EloquentPostRepository');
App::bind('CommentRepositoryInterface', 'EloquentCommentRepository');

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

/**
 * Admin Group
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    // Users Management
    Route::get('users/data', 'admin\UserController@data'); // Outputs Datatables json
    Route::resource('users', 'admin\UserController');

    // User Roles Management
    Route::get('roles/data', 'admin\RoleController@data'); // Outputs Datatables json
    Route::resource('roles', 'admin\RoleController');

    // Posts Management
    Route::get('posts/data', 'admin\PostController@data'); // Outputs Datatables json
    Route::resource('posts', 'admin\PostController');

    // Comments Management
    Route::get('comments/data', 'admin\CommentController@data'); // Outputs Datatables json
    Route::resource('comments', 'admin\CommentController',
                array('except' => array('create', 'store')));

    // Admin Home Page
    Route::controller('/', 'admin\HomeController');
});

/**
 * Frontend Group
 */
Route::group(array('prefix' => 'user'), function()
{
    Route::get('confirm/{code}', 'frontend\UserController@getConfirm');
    Route::get('reset/{token}', 'frontend\UserController@getReset')
        ->where('token', '[0-9a-z]+');
    Route::post('reset/{token}', 'frontend\UserController@postReset')
        ->where('token', '[0-9a-z]+');
    Route::controller( '/', 'frontend\UserController');
});

// Home Page
Route::get('{postSlug}', 'frontend\HomeController@getView');
Route::post('{postSlug}', 'frontend\HomeController@postView');
Route::get('/', array('before' => 'detectLang','uses' => 'frontend\HomeController@getIndex'));

//:: Application Routes ::

// # Filter for detect language
// Route::when('contact-us','detectLang');

// # Contact Us Static Page
// Route::get('contact-us', function()
// {
//     // Return about us page
//     return View::make('site/contact-us');
// });

// # Posts - Second to last set, match slug
// Route::get('{postSlug}', 'BlogController@getView');
// Route::post('{postSlug}', 'BlogController@postView');

// # Index Page - Last route, no matches
// Route::get('/', array('before' => 'detectLang','uses' => 'BlogController@getIndex'));
