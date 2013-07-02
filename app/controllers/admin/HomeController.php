<?php
namespace admin;

use BaseController;
use Lang;
use View;

/*
|--------------------------------------------------------------------------
| Admin Home Controller
|--------------------------------------------------------------------------
*/

class HomeController extends BaseController {

    /**
     * Create a new controller instance
     */
	public function __construct()
    {
    	parent::__construct();
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * Display the admin home page
     *
     * @return View
     */
	public function getIndex()
	{
        $meta = $this->meta;
        $meta['title'] = 'Admin Home Page';
		return View::make('admin/home', compact('meta'));
	}

}