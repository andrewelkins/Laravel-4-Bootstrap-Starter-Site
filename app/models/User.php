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

    public function getPresenter()
    {
        return new UserPresenter($this);
    }

}