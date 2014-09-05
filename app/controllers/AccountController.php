<?php

class AccountController extends BaseController {

    /**
     * Post Model
     * @var Post
     */
    protected $account;

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param Account $account
     * @param User $user
     */
    public function __construct(Account $account, User $user)
    {
        parent::__construct();

        $this->account = $account;
        $this->user = $user;
    }
    
	/**
	 * Returns all the blog posts.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get all the blog posts
		$accounts = $this->account->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('site/account/index', compact('accounts'));
	}
}
