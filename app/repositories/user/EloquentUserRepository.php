<?php

//use LaravelBook\Ardent\Ardent;

/**
 * Repository for the User model
 */
class EloquentUserRepository implements UserRepositoryInterface {

	/**
	 * Display the specified user.
     *
	 * @param  int $id ID of the user.
	 * @return object     returns the $user or a redirect to the admin index if no user is found.
	 */
	public function findById($id)
    {
        // Look for a user with the corresponding ID.
        $user = User::where('id', $id)->first();

        if (!$user) {
        	Redirect::to('admin/users')
                ->with('error', Lang::get('admin/users/messages.does_not_exist'))
                ->send();
        	exit;
        }

        // Return our user.
        return $user;
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  input from POST $data POST data from the create form.
     * @return redirect       redirect to the admin edit page of the new user, or back to the form in case of validation error.
     */
    public function store($data)
    {
    	// Validate the input.
    	$validator = Validator::make($data, User::$rules);

    	if ($validator->fails()) {
            // Redirect back to the user create form with input and errors.
            return Redirect::to('admin/users/create')
                ->withInput($data)
                ->withErrors($validator)
                ->send();
    		exit;
    	}

        // Save the new user
        $user = User::create($data);

    	// Save roles.
        $user->saveRoles(Input::get('roles'));

        // Redirect to the admin edit page of the user.
        Redirect::to('admin/users/' . $user->id . '/edit')
            ->with('success', Lang::get('admin/users/messages.create.success'))
            ->send();
        exit;
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int $id   ID of the user.
     * @param  input from PUT $data data from the edit form.
     * @return redirect       [description]
     */
	public function update($id, $data)
	{
        // Find the user.
		$user = $this->findById($id);

        // Clone the old user to prepare the rules.
        $oldUser = clone $user;

		// Validate the input.
    	$validator = Validator::make($data, $user->getUpdateRules());

        if($validator->fails()) {
            Redirect::to('admin/users/' . $user->id . '/edit')
                ->withInput($data)
                ->withErrors($validator)
                ->send();
            exit;
        }

        if(!empty($password)) {
            if($password === $passwordConfirmation) {
                $user->password = $password;
                // The password confirmation will be removed from model
                // before saving. This field will be used in Ardent's
                // auto validation.
                $user->password_confirmation = $passwordConfirmation;
            } else {
                // Password did not match.
                // Redirect to the new user page.
                return Redirect::to('admin/users/' . $user->id . '/edit')
                    ->with('error', Lang::get('admin/users/messages.password_does_not_match'))
                    ->send();
                exit;
            }
        } else {
            unset($user->password);
            unset($user->password_confirmation);
        }

        // Prepare the validation rules.
        $user->prepareRules($oldUser, $user);

        // Save if valid.
        $user->amend();

        // Save roles. Handles updating.
        $user->saveRoles(Input::get('roles'));

        // Redirect to the newly created user admin edit page.
        Redirect::to('admin/users/' . $user->id . '/edit')
        	->with('success', Lang::get('admin/users/messages.update.success'))
        	->send();
        exit;
	}

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id ID of the user.
     * @return Redirect     Message regarding the results of the deletion.
     */
    public function destroy($id)
    {
        // Find the user.
        $user = $this->findById($id);

        // Check if we are not trying to delete ourselves.
        if ($user->id === Confide::user()->id)
        {
            // Redirect to the user management page
            Redirect::to('admin/users')
                ->with('error', Lang::get('admin/users/messages.delete.impossible'))
                ->send();
        }

        // Delete it's assigned roles.
        AssignedRoles::where('user_id', $user->id)->delete();

        // Delete the user.
        $user->delete();

        // Check for deletion and redirect.
        if (!User::find($id)) {
            Redirect::to('admin/users')
                ->with('success', Lang::get('admin/users/messages.delete.success'))
                ->send();
        } else {
            Redirect::to('admin/users')
                ->with('error', Lang::get('admin/users/messages.delete.error'))
                ->send();
        }
    }

    /**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $users = User::leftjoin('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
                    ->leftjoin('roles', 'roles.id', '=', 'assigned_roles.role_id')
                    ->select(array('users.id', 'users.username','users.email', 'roles.name as rolename', 'users.confirmed', 'users.created_at'));

        return Datatables::of($users)
        // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')

        ->edit_column('confirmed','@if($confirmed)
                            Yes
                        @else
                            No
                        @endif')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                @if($username == \'admin\')
                                @else
                                    <a href="#delete-modal"
                                        class="delForm btn btn-mini btn-danger"
                                        data-toggle="modal"
                                        data-id="{{{ $id }}}"
                                        data-title="{{{ $username }}}">{{{ Lang::get(\'button.delete\') }}}</a>
                                @endif
            ')

        ->remove_column('id')

        ->make();
    }
}