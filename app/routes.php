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

Route::get('/', function()
{
	return View::make('hello');
});

//Authentication routes
Route::post('authenticate', ['as' => 'authenticate', 'uses' => 'UsersController@authenticate']);
Route::get('logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);

//Resource routes
Route::resource('users', 'UsersController');
Route::resource('twixes', 'TwixesController');
Route::resource('followers', 'FollowersController');