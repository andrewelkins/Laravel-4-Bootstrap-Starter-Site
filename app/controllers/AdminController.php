<?php

class AdminController extends BaseController {

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply the admin auth filter
        $this->beforeFilter('admin-auth');
    }

}