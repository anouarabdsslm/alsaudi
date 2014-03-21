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
Route::group(array('prefix' => 'admin/dashboard', 'before' => 'auth'), function()
{
    //get dashboard
    Route::get('/', 'adminController@getIndex');

    # Statios Management
    Route::get('stations', 'stationsController@getAdminStations');

    Route::get('stations/{id}/edit', 'stationsController@getAdminEdit');
    Route::post('stations/{id}/edit', 'stationsController@postAdminEdit');

    Route::get('stations/add', 'stationsController@getAdminAdd');
    Route::post('stations', 'stationsController@postAdminAdd');

    Route::post('stations/{id}', 'stationsController@postDelete');


    # Users Management
    Route::get('users', 'UserController@getAdminUsers');

    Route::get('users/{id}/edit', 'UserController@getAdminEdit');
    Route::post('users/{id}/edit', 'UserController@postAdminEdit');

    Route::get('users/add', 'UserController@getAdminAdd');
    Route::post('users', 'UserController@postAdminAdd');

    Route::post('users/{id}', 'UserController@postDelete');


    # Ticket Management
    Route::get('tickets', 'TicketsController@getAdminTickets');
    Route::get('tickets/{id}/edit', 'TicketsController@getAdminEdit');
    Route::post('tickets/{id}', 'TicketsController@postAdminEdit');
    Route::post('tickets', 'TicketsController@getAdminAdd');
    Route::post('tickets/{id}/delete', 'TicketsController@postDelete');

    # Trains Management
    Route::get('trains', 'TrainsController@getAdminTrains');

    Route::get('trains/{id}/edit', 'TrainsController@getAdminEdit');
    Route::post('trains/{id}/edit', 'TrainsController@postAdminEdit');

    Route::get('trains/add', 'TrainsController@getAdminAdd');
    Route::post('trains', 'TrainsController@postAdminAdd');

    Route::post('trains/{id}', 'TrainsController@postDelete');


    # Trips Management

    Route::get('trips', 'tripsController@getAdminTrips');

    Route::get('trips/{id}/edit', 'tripsController@getAdminEdit');
    Route::post('trips/{id}/edit', 'tripsController@postAdminEdit');

    Route::get('trips/add', 'tripsController@getAdminAdd');
    Route::post('trips', 'tripsController@postAdminAdd');

    Route::post('trips/{id}', 'tripsController@postDelete');


});

//AdminAuth
Route::group(array('prefix' => 'admin'), function()
{
    #Admin Auth
    Route::get('login', 'AdminController@getLogin');
	Route::post('login', 'AdminController@postLogin');
	Route::get('logout', 'AdminController@getLogout');
});
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
    Route::get('user/{id}/edit', 'UserController@getEdit');
    Route::post('user/{id}/edit', 'UserController@postEdit');

});
