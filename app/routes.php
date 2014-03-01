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
 *  Route model binding
 *  ------------------------------------------
 */
// Route::model('account', 'User');
// Route::model('trips', 'Trips');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
// Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
// {

//     # Comment Management
//     Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit');
//     Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit');
//     Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete');
//     Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete');
//     Route::controller('comments', 'AdminCommentsController');

//     # Blog Management
//     Route::get('blogs/{post}/show', 'AdminBlogsController@getShow');
//     Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit');
//     Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit');
//     Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete');
//     Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete');
//     Route::controller('blogs', 'AdminBlogsController');

//     # User Management
//     Route::get('users/{user}/show', 'AdminUsersController@getShow');
//     Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
//     Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
//     Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
//     Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
//     Route::controller('users', 'AdminUsersController');

//     # User Role Management
//     Route::get('roles/{role}/show', 'AdminRolesController@getShow');
//     Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
//     Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
//     Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
//     Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
//     Route::controller('roles', 'AdminRolesController');

//     # Admin Dashboard
//     Route::controller('/', 'AdminDashboardController');
// });

/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

Route::get('/','HomeController@index');

Route::resource('trips', 'TripsController');

Route::resource('creditcards', 'CreditcardsController');

Route::resource('tickets', 'TicketsController');

Route::resource('stations', 'StationsController');

Route::resource('trains', 'TrainsController');

# User RESTful Routes (Login, Logout, Register, etc)
Route::group(array('prefix' => 'account'), function(){

	Route::get('/', 'UserController@getIndex');
	Route::post('/', 'UserController@postNew');
	Route::get('login', 'UserController@getLogin');
	Route::post('login', 'UserController@postLogin');
	Route::get('/logout', 'UserController@getLogout');
});

Route::group(array('prefix' => 'dashboard'), function(){

	Route::get('user', 'UserController@getDashboard');

});
