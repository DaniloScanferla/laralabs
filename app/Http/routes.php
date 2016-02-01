<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {
    Route::get('home', function () {
	    return view('home');
	});

	Route::get('/getRequest', function(){
		if(Request::ajax()){
			return 'getRequest has loaded completely.';
		}
	});

	Route::post('/register', function(){
		if(Request::ajax()){
			return Response::json(Request::all());	
		}
	});
});