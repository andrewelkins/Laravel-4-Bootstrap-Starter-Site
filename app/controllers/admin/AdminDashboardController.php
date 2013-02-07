<?php

class AdminDashboardController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 */
	public function index()
	{
        return View::make('home');
	}


}