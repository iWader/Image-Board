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

});
