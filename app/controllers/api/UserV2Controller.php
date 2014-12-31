<?php

class UserV2Controller extends \APIController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Role Model
     * @var Role
     */
    protected $role;

    /**
     * Permission Model
     * @var Permission
     */
    protected $permission;

    /**
     * Inject the models.
     * @param User $user
     * @param Role $role
     * @param Permission $permission
     */
    public function __construct(User $user, Role $role, Permission $permission)
    {
        parent::__construct();
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

	public function index()
	{
        try{
            $statusCode = 200;
            $builder = ApiHandler::parseMultiple($this->user, array('name,email'), $this->passParams('users'));
            $users = $builder->getResult();
            $response = [];

            foreach($users as $user){
                $response[] = $this->responseMap($user);
            }

            return $this->makeResponse($response,$statusCode, $builder);
        } catch (Exception $e){
            $statusCode = 500;
            $message = $e->getMessage();
            return Response::json($message, $statusCode);
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->user->username = Input::get( 'username' );
            $this->user->email = Input::get( 'email' );
            $this->user->password = Input::get( 'password' );

            // The password confirmation will be removed from model
            // before saving. This field will be used in Ardent's
            // auto validation.
            $this->user->password_confirmation = Input::get( 'password_confirmation' );

            // Generate a random confirmation code
            $this->user->confirmation_code = md5(uniqid(mt_rand(), true));

            if (Input::get('confirm')) {
                $this->user->confirmed = (Input::get('confirmed') == 'true') ? true : false;
            }

            // Save if valid. Password field will be hashed before save
            $this->user->save();

            if ( $this->user->id ) {
                // Save roles. Handles updating.
                $this->user->saveRoles(Input::get( 'roles' ));

                if (Config::get('confide::signup_email')) {
                    $user = $this->user;
                    Mail::queueOn(
                        Config::get('confide::email_queue'),
                        Config::get('confide::email_account_confirmation'),
                        compact('user'),
                        function ($message) use ($user) {
                            $message
                                ->to($user->email, $user->username)
                                ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                        }
                    );
                }
                return $this->show($this->user->id);
            } else {
                $statusCode = 500;
                $error = $this->user->errors()->all();
                return Response::json($error, $statusCode);
            }
        } catch (Exception $e){
            $statusCode = 500;
            $error = $e->getMessage();
            return Response::json($error, $statusCode);
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        try{
            $statusCode = 200;
            $user = User::find($id);

            $response = $this->responseMap($user);

            return Response::json($response,$statusCode);

        }catch (Exception $e){
            $statusCode = 500;
            return Response::json($e->getMessage(), $statusCode);
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            $user = $this->user->findOrFail($id);
            $user->username = Input::get( 'username' );
            $user->email = Input::get( 'email' );

            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $user->password_confirmation = $passwordConfirmation;
                } else {
                    throw new Exception (Lang::get('admin/users/messages.password_does_not_match'));
                }
            }

            // Generate a random confirmation code
            $user->confirmation_code = md5(uniqid(mt_rand(), true));

            if (!$user->confirmed) {
                $user->confirmed = (Input::get('confirmed') == 'true') ? true : false;
            }

            if ( $user->save() ) {
                // Save roles. Handles updating.
                $user->saveRoles(Input::get( 'roles' ));
                return $this->show($user->id);
            } else {
                $statusCode = 500;
                $error = $user->errors()->all();
                return Response::json($error, $statusCode);
            }
        } catch (Exception $e){
            $statusCode = 500;
            $error = $e->getMessage();
            return Response::json($error, $statusCode);
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try{
            $statusCode = 200;
            $user = $this->user->findOrFail($id);
            // Check if we are not trying to delete ourselves
            if ($user->id === Confide::user()->id)
            {
                // Redirect to the user management page
                throw new Exception (Lang::get('admin/users/messages.delete.impossible'));
            }

            AssignedRoles::where('user_id', $user->id)->delete();

            $id = $user->id;
            $user->delete();

            // Was the comment post deleted?
            $user = $this->user->find($id);
            if ( empty($user) )
            {
                $response = Lang::get('admin/users/messages.delete.success');
            }
            else
            {
                // There was a problem deleting the user
                $response = Lang::get('admin/users/messages.delete.error');
            }
            return Response::json($response,$statusCode);

        }catch (Exception $e){
            $statusCode = 500;
            $error = $e->getMessage();
            return Response::json($error, $statusCode);
        }
	}

    private function responseMap($object)
    {
        return [
            'id'            => $object->id,
            'email'         => $object->email,
            'username'      => $object->username,
            'confirmed'     => ($object->confirmed) ? true : false,
            'roles'         => $object->currentRoleIds(),
        ];
    }

}
