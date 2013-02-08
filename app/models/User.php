<?php

use Zizaco\Confide\ConfideUser;
use BigElephant\Presenter\PresentableInterface;

class User extends ConfideUser implements PresentableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

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

    public function getPresenter()
    {
        return new UserPresenter($this);
    }

}