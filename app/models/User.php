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


    /**
     * Check is user is confirmed.
     * @param $credentials
     * @return bool
     */
    public static function isConfirmed( $credentials )
    {
        $user = (new User())
            ->where('email','=',$credentials['email'])
            ->orWhere('username','=',$credentials['email'])
            ->first();

        // If confirmed return true.
        if( !is_null($user) AND $user->confirmed )
        {
            return true;
        }
        else
        {
            // Fail
            return false;
        }

    }

    /**
     * Redirect after auth.
     * If ifValid is set to true it will redirect a logged in user.
     * @param $redirect
     * @param bool $ifValid
     * @return mixed
     */
    public static function checkAuthAndRedirect($redirect, $ifValid=false)
    {
        // Get the user information
        $user = Auth::user();
        $redirectTo = false;

        if(empty($user->id) && ! $ifValid) // Not logged in redirect, set session.
        {
            Session::put('loginRedirect', $redirect);
            $redirectTo = Redirect::to('user/login')
                ->with( 'notice', Lang::get('user/user.login_first') );
        }
        elseif(!empty($user->id) && $ifValid) // Valid user, we want to redirect.
        {
            $redirectTo = Redirect::to($redirect);
        }

        return array($user, $redirectTo);
    }



}
