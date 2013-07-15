<?php

/**
 * Repository for the Role model using Eloquent ORM
 */
class EloquentRoleRepository extends Role implements RoleRepositoryInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Return all possible roles
     *
     * @return object All roles.
     */
    public function findAll()
    {
        return Role::get();
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
        $role = Role::find($id);

        if (!$role) {
             $error = array(
                'code'    => '404',
                'message' => 'Role Not Found'
            );
            return $error;
        }

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
        $validator = $this->validateOrError($data, Role::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $role = Role::create($data);

        // Save permissions.
        $role->perms()->sync($this->preparePermissionsForSave($data['permissions']));

        if ($role->id) {
            return $role;
        } else {
            // Should not really happen...
            $error = array(
                'code'    => '404',
                'message' => 'Could Not Create Comment'
            );
            return $error;
        }
    }

    /**
     * Update the specified role
     *
     * @param  array $data PUT data from the request.
     *
     * @return object Updated role.
     */
	public function updateAndValidate(array $data = array())
	{
		$validator = $this->validateOrError($data, Role::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $this->name = $data['name'];

        $this->update($data);

        $this->perms()->sync($this->preparePermissionsForSave($data['permissions']));

        return $this;
	}

    /**
     * Delete the specified role
     *
     * @param  int $id ID of the role.
     *
     * @return int ID of the role.
     */
    public static function destroy($id)
    {
        $role = self::findById($id);

        // Check if we are not trying to delete the admin role.
        if ($role->id === '1') {
            $error = array(
                'code'    => '403',
                'message' => 'Can Not Delete Admin Role'
            );
            return $error;
        }

        // Clean up.
        $role->users()->detach();
        $role->perms()->detach();

        $role->delete();

        // Check for deletion.
        if (!Role::find($id)) {
            return 'success';
        } else {
            $error = array(
                'code'    => '404',
                'message' => 'Can Not Delete User'
            );
            return $error;
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
        return new Role($data);
    }

    /**
     * Validate data
     *
     * @param  array $data  Data to be validated.
     * @param  array $rules Rules for validation.
     *
     * @return boot Always true if it returns.
     */
    public function validateOrError($data, $rules)
    {
        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            $message = $validator->messages();
            $error = array(
                'code'    => '400',
                'message' => $message
            );
            return $error;
        }

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