<?php

class UserSettingsController extends AuthorizedController {

	/**
	 * Users settings page
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get the user information
		$user = Confide::getAuthIdentifier();

		// Show the page
		return View::make('site/user/settings', compact('user'));
	}

	/**
	 * Users settings form processing page.
	 *
	 * @return Redirect
	 */
	public function postIndex()
	{
		// Declare the rules for the form validation
		$rules = array(
			'first_name' => 'required',
			'last_name'  => 'required',
			'email'      => 'required|email|unique:users,email,' . Sentry::getUser()->email . ',email',
		);

		// If we are updating the password
		if (Input::get('password'))
		{
			// Update the validation rules
			$rules['password']              = 'required|Confirmed';
			$rules['password_confirmation'] = 'required';
		}

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success
		if ($validator->passes())
		{
			// Update the user
			$user = Sentry::getUser();
			$user->first_name = Input::get('first_name');
			$user->last_name  = Input::get('last_name');
			$user->email      = Input::get('email');

			// Are we updating the user password?
			if (Input::get('password'))
			{
				$user->password = Input::get('password');
			}

			// Save the user
			$user->save();

			// Redirect to the register page
			return Redirect::to('account/settings')->with('success', 'Account updated with success!');
		}

		// Something went wrong
		return Redirect::to('account/settings')->withInput()->withErrors($validator->messages());
	}

}
