<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/users', 'UserController');
// Route::post('/user', 'UserController@store');

Route::get('/user', function (Request $request) {
	return 1;
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');