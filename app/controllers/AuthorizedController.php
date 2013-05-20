<?php

class AuthorizedController extends BaseController
{
	protected $whitelist = array();

    /**
     * Initializer.
     *
     * @access   public
     * @return \AuthorizedController
     */
	public function __construct()
	{
        parent::__construct();
		// Check if the user is logged in.
		//
		$this->beforeFilter('auth', array('except' => $this->whitelist));
	}
}
