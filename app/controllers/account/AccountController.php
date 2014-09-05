<?php

class AccountController extends BaseController {

    /**
     * Account Model
     * @var Account
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
		
		//@TODO  If user is admin - show all users. If not only show logged in user.
		
		// Get all the blog posts
		$accounts = $this->account->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('site/account/index', compact('accounts'));
	}
	
	/**
     * Displays the form for user creation
     *
     */
    public function getCreate()
    {
        return View::make('site/account/create_edit');
    }
	
	/**
     * Edits a user
     *
     */
    public function postEdit($account)
    {
        // Validate the inputs
        $validator = Validator::make(Input::all(), $account->getUpdateRules());


        if ($validator->passes())
        {
            $oldAccount = clone $account;
            $account->name = Input::get( 'name' );
            $account->cloudProvider = Input::get( 'cloudProvider' );
			$account-> userid = ''; // logged in user id
            //@TODO  based on the json template for provider to populate, load the field and values.
            // Save it in credentials field of table as json.
            $account->prepareRules($oldAccount, $account);

            // Save if valid. 
            $account->amend();
        }

        // Get validation errors (see Ardent package)
        $error = $account->errors()->all();

        if(empty($error)) {
            return Redirect::to('account')
                ->with( 'success', Lang::get('account/account.account_account_updated') );
        } else {
            return Redirect::to('account')
                ->with( 'error', $error );
        }
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