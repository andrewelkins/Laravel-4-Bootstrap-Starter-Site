<?php

class AdminController extends BaseController {

    /**
     * Initializer.
     *
     * @return \AdminController
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function ngadmin(){
        return View::make('admin.ngadmin');
    }

}