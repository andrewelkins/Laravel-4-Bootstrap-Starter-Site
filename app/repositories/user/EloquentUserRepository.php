<?php

/**
 * Repository for the User model using Eloquent ORM
 */
class EloquentUserRepository implements UserRepositoryInterface {

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
        $user = User::where('id', $id)->first();

        if (!$user) throw new NotFoundException('User Not Found');

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
        $this->validate($data, User::$rules);

        // Following is adapted from Confide generated controller.
        $user = $this->instance();

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->password_confirmation = Input::get( 'password_confirmation' );

        // Save if valid. Password field will be hashed before save.
        $user->save();

        if ($user->id) {
            return $user;
        } else {
            // Should not really happen...
            return false;
        }
    }

    /**
     * Update the specified user
     *
     * @param  int   $id   ID of the user.
     * @param  array $data PUT data from the request.
     *
     * @return object Updated user.
     */
    public function update($id, $data)
    {
        // Find the user.
        $user = $this->findById($id);

        $this->validate($data, $user->getUpdateRules());

        $oldUser = clone $user;
        $user->username = $data['username'];
        $user->email = $data['email'];

        if(in_array('password', $data)) {
            $user->password = $data['password'];
            // The password confirmation will be removed from model
            // before saving.
            $user->password_confirmation = $data['password_confirmation'];
        } else {
            unset($user->password);
            unset($user->password_confirmation);
        }

        $user->prepareRules($oldUser, $user);

        // Save if valid. Password field will be hashed before save
        $user->amend();

        return $user;
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
    public function validate($data, $rules)
    {
        $validator = Validator::make($data, $rules);

        if($validator->fails()) throw new ValidationException($validator);
        return true;
    }

}