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
	 * Returns all the Accounts for logged in user.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        if($redirect){return $redirect;}
		
		// Get all the blog posts
		$accounts = $this->account->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('site/account/index', compact('accounts'));
	}
	
	public function getFields()
	{
		$ret = '';
		
		$provider = Input::get( 'provider' );
        $accountId = Input::get( 'accountId' );
		if(!empty($accountId)) 
		{
			$acctModel = new Account($accountId);
			
		}
		
        switch($provider)
		{
			case 'Amazon AWS' : $apiAccessKey = isset($acctModel->content->apiAccessKey) ? $acctModel->content->apiAccessKey : '';
								$secretAccessKey = isset($acctModel->content->secretAccessKey) ? $acctModel->content->secretAccessKey : '';
								$ret = array(
												array('id' => 'apiAccessKey', 'name' => 'apiAccessKey', 'type' => 'text', 'value' => $apiAccessKey),
												array('id' => 'secretAccessKey', 'name' => 'secretAccessKey', 'type' => 'text', 'value' => $secretAccessKey),
											);
											
		}
		print json_encode($ret);
	}
    
}