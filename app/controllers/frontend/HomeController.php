<?php
namespace frontend;

use BaseController;
use Lang;
use View;

/*
|--------------------------------------------------------------------------
| Home Controller
|--------------------------------------------------------------------------
*/

class HomeController extends BaseController {

    /**
     * Create a new controller instance
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

    /**
     * Display the home page
     *
     * @return View
     */
	public function getIndex()
	{
        $meta = $this->meta;
        $meta['title'] = 'Home Page';
		return View::make('frontend/home', compact('meta'));
	}

}