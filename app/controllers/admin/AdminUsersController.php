<?php

class AdminUsersController extends AdminController {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // Grab all the users
        $users = User::paginate(10);

        // Show the page
        return View::make('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        // All roles
        $roles = Role::all();

        // Get all the available permissions
        $permissions = Role::getAvailablePermissions();

        // Selected groups
        $selectedRoles = Input::old('roles', array());

        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());

        // Show the page
        return View::make('admin/users/create', compact('roles', 'permissions', 'selectedRoles', 'selectedPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        $user = new User;

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'password_confirmation' );
        $user->confirmed = Input::get( 'confirm' );

        // Permissions are currently tied to roles. Can't do this yet.
        //$user->permissions = $user->roles()->preparePermissionsForSave(Input::get( 'permissions' ));

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ( $user->id )
        {
            // Save roles. Handles updating.
            $user->saveRoles(Input::get( 'roles' ));

            // Redirect to the new user page
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('success', Lang::get('admin/users/messages.create.success'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->getErrors()->all();

            return Redirect::to('admin/users/create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function getShow($id)
    {
        // redirect to the frontend
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function getEdit($id)
    {
        $user = User::find($id);

        if ( $user->id )
        {
            $roles = Role::all();
            $permissions = Role::getAvailablePermissions();
            // Show the page
            return View::make('admin/users/edit', compact('user', 'roles', 'permissions'));
        }
        else
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return Response
     */
    public function postEdit($id)
    {

        $user = User::find($id);

        if ( empty($user->id) )
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }

        // Save roles. Handles updating.
        $user->saveRoles(Input::get( 'roles' ));

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->confirmed = Input::get( 'confirm' );

        $password = Input::get( 'password' );
        $passwordConfirmation = Input::get( 'password_confirmation' );
        
        if($password === $passwordConfirmation) {
            $user->password = $password;
            // The password confirmation will be removed from model
            // before saving. This field will be used in Ardent's
            // auto validation.
            $user->password_confirmation = $passwordConfirmation;
        } else {
            // Redirect to the new user page
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
        }
        
        // Save if valid. Password field will be hashed before save
        $check = $user->save($user->updateRules);

        if ( !$check )
        {
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.edit.failure'));
        }
        elseif ( $user->id )
        {
            // Redirect to the new user page
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('success', Lang::get('admin/users/messages.edit.success'));
        }
        else
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
     * Remove user page.
     *
     * @param $id
     * @return Response
     */
    public function getDelete($id)
    {
        // Check if the user exists
        if (is_null($user = User::find($id)))
        {
            // Redirect to the users management page
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }

        // Show the page
        return View::make('admin/users/delete', compact('user'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete($id)
    {

        $user = User::find($id);

        if ( empty($user->id) )
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }


        // Check if we are not trying to delete ourselves
        if ($user->id === Confide::user()->id)
        {
            // Redirect to the user management page
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.delete.impossible'));
        }

        $user->delete();

        // Was the comment post deleted?
        $user = User::find($id);
        if ( empty($user) )
        {
            // TODO needs to delete all of that user's content
            return Redirect::to('admin/users')->with('success', Lang::get('admin/users/messages.delete.success'));
        }
        else
        {
            // There was a problem deleting the user
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.delete.error'));
        }
    }
}