<?php

namespace frontend;

use BaseController;
use Lang;
use View;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	*/

	public function __construct()
    {
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

	public function getIndex()
	{
        $meta = $this->meta;
        $meta['title'] = 'Home Page';
		return View::make('frontend/home', compact('meta'));
	}

}