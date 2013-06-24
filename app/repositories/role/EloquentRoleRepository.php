<?php

/**
 * Repository for the Role model
 */
class EloquentRoleRepository implements RoleRepositoryInterface {

    /**
     * Display all possible roles.
     * @return object return all the roles.
     */
    public function findAll() {
        return Role::get();
        }

	/**
	 * Display the specified role.
     *
	 * @param  int $id ID of the role.
	 * @return object     returns the $role or a redirect to the admin index if no role is found.
	 */
	public function findById($id)
    {
        // Look for a role with the corresponding ID.
        $role = Role::where('id', $id)->first();

        if (!$role) {
            // No role found.
        	Redirect::to('admin/roles')
                ->with('error', Lang::get('admin/roles/messages.does_not_exist'))
                ->send();
        	exit;
        }

        // Return our role.
        return $role;
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  input from POST $data POST data from the create form.
     * @return redirect       redirect to the admin edit page of the new role, or back to the form in case of validation error.
     */
    public function store($data)
    {
        // Validate the input.
        $validator = Validator::make($data, Role::$rules);

        if ($validator->fails()) {
            // Redirect back to the role create form with input and errors.
            return Redirect::to('admin/roles/create')
                ->withInput($data)
                ->withErrors($validator)
                ->send();
            exit;
        }

        // Save the new role
        $role = Role::create($data);

        // Save permissions
        $role->perms()->sync($this->preparePermissionsForSave($data['permissions']));

        // Redirect to the admin edit page of the new role.
        Redirect::to('admin/roles/' . $role->id . '/edit')
            ->with('success', Lang::get('admin/roles/messages.create.success'))
            ->send();
        exit;
    }

    /**
     * Update the specified role in storage.
     *
     * @param  int $id   ID of the role.
     * @param  input from PUT $data data from the edit form.
     * @return redirect       [description]
     */
	public function update($id, $data)
	{
        // Find the role.
		$role = $this->findById($id);

		// Validate the input.
    	$validator = Validator::make($data, Role::$rules);

        if($validator->fails()) {
            Redirect::to('admin/roles/' . $role->id . '/edit')
                ->withInput($data)
                ->withErrors($validator)
                ->send();
            exit;
        }

        // Save if valid.
        $role->update($data);

        $role->perms()->sync($this->preparePermissionsForSave($data['permissions']));

        // Redirect to the role admin edit page.
        Redirect::to('admin/roles/' . $role->id . '/edit')
        	->with('success', Lang::get('admin/roles/messages.update.success'))
        	->send();
        exit;
	}

    /**
     * Remove the specified role from storage.
     *
     * @param  int $id ID of the role.
     * @return Redirect     Message regarding the results of the deletion.
     */
    public function destroy($id)
    {
        // Find the role.
        $role = $this->findById($id);

        // Delete the role.
        $role->delete();

        // Check for deletion and redirect.
        if (!Role::find($id)) {
            Redirect::to('admin/roles')
                ->with('success', Lang::get('admin/roles/messages.delete.success'))
                ->send();
        } else {
            Redirect::to('admin/roles')
                ->with('error', Lang::get('admin/roles/messages.delete.error'))
                ->send();
        }
    }

    /**
     * Show a list of all the roles formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $roles = Role::select(array('roles.id',  'roles.name', 'roles.id as users', 'roles.created_at'));

        return Datatables::of($roles)
        // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')
        ->edit_column('users', '{{{ DB::table(\'assigned_roles\')->where(\'role_id\', \'=\', $id)->count()  }}}')


        ->add_column('actions', '<a href="{{{ URL::to(\'admin/roles/\' . $id . \'/edit\' ) }}}"
                                    class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="#delete-modal"
                                    class="delForm btn btn-mini btn-danger"
                                    data-toggle="modal"
                                    data-id="{{{ $id }}}"
                                    data-title="{{{ $name }}}">{{{ Lang::get(\'button.delete\') }}}</a>
                    ')

        ->remove_column('id')

        ->make();
    }

    /**
     * Convert from input array to savable array.
     * @param $permissions
     * @return array
     */
    public function preparePermissionsForSave($permissions)
    {

        $availablePermissions = Permission::all()->toArray();
        $preparedPermissions = array();
        foreach( $permissions as $permission => $value )
        {
            // If checkbox is selected
            if( $value == '1' )
            {
                // If permission exists
                array_walk($availablePermissions, function(&$value) use($permission, &$preparedPermissions){
                    if($permission == (int)$value['id']) {
                        $preparedPermissions[] = $permission;
                    }
                });
            }
        }
        return $preparedPermissions;
    }
}