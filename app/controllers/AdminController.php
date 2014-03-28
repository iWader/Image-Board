<?php

use Illuminate\Support\MessageBag;

class AdminController extends \BaseController {

	public function login()
	{
		return View::make('admin.login');
	}

	public function login_post()
	{
		if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
		{
			return Redirect::intended('admin/dashboard');
		}

		return Redirect::back()->withErrors(new MessageBag(['Could not find a user with that email and password combination. Please try again']));
	}

	public function dashboard()
	{
		return View::make('admin.dashboard');
	}

}
