<?php
namespace admin;

use BaseController;
use Lang;
use View;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Admin Home Controller
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
        $meta['title'] = 'Admin Home Page';
		return View::make('admin/home', compact('meta'));
	}

}