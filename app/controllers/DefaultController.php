<?php

class DefaultController extends BaseController {

	public function index()
	{
		return View::make('index');
	}

	public function load_content()
	{
		$ids = (Input::has('ids') ? Input::get('ids') : [0]);

		return Response::json(Photo::whereNotIn('id', $ids)->take(5)->get());
	}

}
