<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	// dd(Config::get('database'));
    return view('welcome');
});

// Route::get('api/user', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
