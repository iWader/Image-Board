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

Route::get('/', ['uses' => 'DefaultController@index']);

Route::group(['prefix' => 'admin'], function()
{

	Route::get('/login', ['uses' => 'AdminController@login']);
	Route::post('/login', ['uses' => 'AdminController@login_post']);

	Route::group(['before' => 'auth'], function()
	{

		Route::get('/dashboard', ['uses' => 'AdminController@dashboard']);

		Route::group(['prefix' => 'photo'], function()
		{

			Route::get('/', ['uses' => 'PhotoController@index']);
			Route::get('/create', ['uses' => 'PhotoController@create']);
			Route::post('/store', ['uses' => 'PhotoController@store']);
			Route::get('/delete/{photo}', ['uses' => 'PhotoController@destroy']);
			Route::get('/restore/{trashed_photo}', ['uses' => 'PhotoController@restore']);

			Route::get('/edit/{photo}', ['uses' => 'PhotoController@edit']);
			Route::post('/edit/{photo}', ['uses' => 'PhotoController@update']);

		});

	});

});

Route::bind('photo', function($value, $route)
{
	return Photo::find($value);
});

Route::bind('trashed_photo', function($value, $route)
{
	return Photo::withTrashed()->find($value);
});
