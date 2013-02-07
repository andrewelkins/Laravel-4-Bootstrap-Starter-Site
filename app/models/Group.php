<?php

use Cartalyst\Sentry\Groups\Eloquent\Group as SentryGroupModel;

class Group extends SentryGroupModel {

	/**
	 * Returns the user full name, it simply
	 * concatenates the first and last name.
	 *
	 * @return string
	 */
	public function fullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	/**
	 * Returns the date of the user creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return ExpressiveDate::make($this->created_at)->getRelativeDate();
	}

	/**
	 * Returns the date of the user last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
		return ExpressiveDate::make($this->updated_at)->getRelativeDate();
	}

}
