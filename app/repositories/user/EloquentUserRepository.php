<?php

/**
 * Repository for the User model using Eloquent ORM
 */
class EloquentUserRepository extends User implements UserRepositoryInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Return all possible users
     *
     * @return object All users.
     */
    public function findAll()
    {
        return User::all();
    }

    /**
     * Display the specified user
     *
     * @param  int $id ID of the user
     *
     * @return object Specified user.
     */
    public function findById($id)
    {
        $user = User::find($id);

        if (!$user) {
            $error = array(
                'code'    => '404',
                'message' => 'User Not Found'
            );
            return $error;
        }
        return $user;
    }

    /**
     * Store a new user
     *
     * @param  array $data POST data from the request.
     *
     * @return object Created user.
     */
    public function store($data)
    {
        $validator = $this->validateOrError($data, User::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        // Following is adapted from Confide generated controller.
        $user = $this->instance();

        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = $data['password_confirmation'];

        if (array_key_exists('confirmed', $data)) {
            $user->confirmed = $data['confirmed'];
        }

        // Save if valid. Password field will be hashed before save.
        $user->save();

        if ($user->id) {
            if (array_key_exists('roles', $data)) {
                $user->roles()->sync($data['roles']);
            } else {
                $user->roles()->sync(array(1)); // Assign default role.
            }
            return $user;
        } else {
            // Should not really happen...
            $error = array(
                'code'    => '404',
                'message' => 'Could Not Create User'
            );
            return $error;
        }
    }

    /**
     * Update the specified user
     *
     * @param  array $data PUT data from the request.
     *
     * @return object Updated user.
     */
    public function updateAndValidate(array $data = array())
    {
        $validator = $this->validateOrError($data, $this->getUpdateRules());

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $oldUser = clone $this;
        $this->username = $data['username'];
        $this->email = $data['email'];

        // Make sure the field is not empty. We assume if its empty they are updating another field.
        if(array_key_exists('password', $data) && !empty($data['password'])) {
            $this->password = $data['password'];
            // The password confirmation will be removed from model
            // before saving.
            $this->password_confirmation = $data['password_confirmation'];
        } else {
            unset($this->password);
            unset($this->password_confirmation);
        }

        if (array_key_exists('confirmed', $data)) {
            $this->confirmed = $data['confirmed'];
        }

        $this->prepareRules($oldUser, $this);

        // Save if valid. Password field will be hashed before save
        $this->amend();

        if (array_key_exists('roles', $data)) {
                $this->roles()->sync($data['roles']);
            } else {
                $this->roles()->sync(array(1)); // Assign default role.
            }

        return $this;
    }

    /**
    * Delete the specified user
    *
    * @param  int $id ID of the user.
    *
    * @return
    */
    public static function destroy($id)
    {
        // Find the user.
        $user = self::findById($id);

        // Check if we are not trying to delete ourselves.
        // Need to check if Auth::user() works the same here...
        if ($user->id === Confide::user()->id) {
            $error = array(
                'code'    => '403',
                'message' => 'Can Not Delete Yourself'
            );
            return $error;
            //throw new PermissionException('Can Not Delete Yourself');
        }

        // Delete it's assigned roles.
        AssignedRoles::where('user_id', $user->id)->delete();

        // Delete the user.
        $user->delete();

        // Check for deletion and redirect.
        if (!User::find($id)) {
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
     * Create a new Confide user object
     *
     * @param  array  $data User data
     *
     * @return object User object
     */
    public function instance($data = array())
    {
        return new User($data);
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

}