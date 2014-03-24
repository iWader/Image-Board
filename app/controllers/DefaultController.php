<?php

class DefaultController extends BaseController {

	public function index()
	{
		return View::make('index');
	}

}
