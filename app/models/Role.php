<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {
    public $autoHydrateEntityFromInput = true;

    protected $fillable = array(
        'name'
    );

    /**
     * Ardent validation rules
     *
     * @var array
     */
    public static $rules = array(
      'name' => 'required|between:4,16'
    );

    /**
     * Same presenter as the user model.
     * @return Robbo\Presenter\Presenter|UserPresenter
     */
    public function getPresenter()
    {
        return new UserPresenter($this);
    }

    /**
     * Provide an array of strings that map to valid roles.
     * @param array $roles
     * @return stdClass
     */
    public function validateRoles( array $roles )
    {
        $user = Confide::user();
        $roleValidation = new stdClass();
        foreach( $roles as $role )
        {
            // Make sure theres a valid user, then check role.
            $roleValidation->$role = ( empty($user) ? false : $user->hasRole($role) );
        }
        return $roleValidation;
    }
}