<?php namespace Zizaco\Confide;

/**
 * A layer that abstracts all database interactions that happens
 * in Confide
 */
interface ConfideRepository
{
    /**
     * Returns the model set in auth config
     *
     * @return mixed Instantiated object of the 'auth.model' class
     */
    public function model();

    /**
     * Set the user confirmation to true.
     *
     * @param string $code
     * @return bool
     */
    public function confirm( $code );

    /**
     * Find a user by the given email
     *
     * @param  string $email The email to be used in the query
     * @return ConfideUser   User object
     */
    public function getUserByMail( $email );

    /**
     * Find a user by it's credentials. Perform a 'where' within
     * the fields contained in the $identityColumns.
     *
     * @param  array $credentials      An array containing the attributes to search for
     * @param  mixed $identityColumns  Array of attribute names or string (for one atribute)
     * @return ConfideUser             User object
     */
    public function getUserByIdentity( $credentials, $identityColumns = array('email') );

    /**
     * Get password reminders count by the given token
     *
     * @param  string $token
     * @return int    Password reminders count
     */
    public function getPasswordRemindersCount( $token );

    /**
     * Get email of password reminder by the given token
     *
     * @param  string $token
     * @return string Email
     */
    public function getEmailByReminderToken( $token );

    /**
     * Remove password reminder from database by the given token
     *
     * @param  string $token
     * @return void
     */
    public function deleteEmailByReminderToken( $token );

    /**
     * Change the password of the given user. Make sure to hash
     * the $password before calling this method.
     *
     * @param  ConfideUser $user     An existent user
     * @param  string      $password The password hash to be used
     * @return boolean Success
     */
    public function changePassword( $user, $password );

    /**
     * Generate a token for password change and saves it in
     * the 'password_reminders' table with the email of the
     * user.
     *
     * @param  ConfideUser $user     An existent user
     * @return string Password reset token
     */
    public function forgotPassword( $user );

    /**
     * Checks if an non saved user has duplicated credentials
     * (email and/or username)
     *
     * @param  ConfideUser  $user The non-saved user to be checked
     * @return int          The number of duplicated entry founds. Probably 0 or 1.
     */
    public function userExists( $user );

    /**
     * Set the 'confirmed' column of the given user to 1
     *
     * @param  ConfideUser $user     An existent user
     * @return boolean Success
     */
    public function confirmUser( $user );

    public function validate($user, array $rules, array $customMessages);
}
