<?php

/**
 * Repository for the Role model using Eloquent ORM
 */
class EloquentRoleRepository implements RoleRepositoryInterface {

    /**
     * Return all possible roles
     *
     * @return object All roles.
     */
    public function findAll()
    {
        return Role::all();
    }

	/**
	 * Display the specified role
     *
	 * @param  int $id ID of the role.
     *
	 * @return object Specified role.
	 */
	public function findById($id)
    {
        $role = Role::where('id', $id)->first();

        if (!$role) throw new NotFoundException('Role Not Found');

        return $role;
    }

    /**
     * Store a new role
     *
     * @param  array $data POST data from the request.
     *
     * @return object Created role.
     */
    public function store($data)
    {
        $this->validate($data, Role::$rules);

        $role = Role::create($data);

        // Save permissions.
        $role->perms()->sync($this->preparePermissionsForSave($data['permissions']));

        if ($role->id) {
            return $role;
        } else {
            // Should not really happen...
            return false;
        }
    }

    /**
     * Update the specified role
     *
     * @param  int   $id   ID of the role.
     * @param  array $data PUT data from the request.
     *
     * @return object Updated role.
     */
	public function update($id, $data)
	{
		$role = $this->findById($id);

		$this->validate($data, Role::$rules);

        $role->update($data);

        $role->perms()->sync($this->preparePermissionsForSave($data['permissions']));

        return $role;
	}

    /**
     * Delete the specified role
     *
     * @param  int $id ID of the role.
     *
     * @return int ID of the role.
     */
    public function destroy($id)
    {
        $role = $this->findById($id);

        $role->delete();

        // Check for deletion.
        if (!Role::find($id)) {
            return $id;
        } else {
            throw new ValidationException($id);
        }
    }

    /**
     * Create a new role object
     *
     * @param  array  $data Role data
     *
     * @return object Role object
     */
    public function instance($data = array())
    {
        return new Post($data);
    }

    /**
     * Validate data
     *
     * @param  array $data  Data to be validated.
     * @param  array $rules Rules for validation.
     *
     * @return boot Always true if it returns.
     */
    public function validate($data, $rules)
    {
        $validator = Validator::make($data, $rules);

        if($validator->fails()) throw new ValidationException($validator);
        return true;
    }

    /**
     * Prepares permission input array for save
     *
     * @param $permissions
     *
     * @return array Prepared permissions.
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