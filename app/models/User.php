<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;
use BigElephant\Presenter\PresentableInterface;

class User extends ConfideUser implements PresentableInterface {
    use HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    public function getPresenter()
    {
        return new UserPresenter($this);
    }

    /**
     * Get user by username
     * @param $username
     * @return mixed
     */
    public function getUserByUsername( $username )
    {
        return $this->where('username', '=', $username)->first();
    }

    /**
     * Get the date the user was created.
     *
     * @return string
     */
    public function joined()
    {
        return ExpressiveDate::make($this->created_at)->getRelativeDate();
    }

    /**
     * Save roles inputted from multiselect
     * @param $inputRoles
     */
    public function saveRoles($inputRoles)
    {
        $this->roles()->delete();
        if(! empty($inputRoles))
        {
            $this->roles()->sync($inputRoles);
            foreach( $inputRoles as $role )
            {
                // Attach role to user by id.
                $this->attachRole( $role ); // Parameter can be an Role object, array or id.
            }
        }
    }

    /**
     * Returns user's current role ids only.
     * @return array|bool
     */
    public function currentRoleIds()
    {
        $roles = $this->roles;
        $roleIds = false;
        if( !empty( $roles ) )
        {
            $roleIds = array();
            foreach( $roles as &$role )
            {
                $roleIds[] = $role->id;
            }
        }
        return $roleIds;
    }


}