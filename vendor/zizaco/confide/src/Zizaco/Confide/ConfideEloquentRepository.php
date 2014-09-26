<?php namespace Zizaco\Confide;

/**
 * A layer that abstracts all database interactions that happens
 * in Confide
 */
class ConfideEloquentRepository implements ConfideRepository
{
    /**
     * Laravel application
     * 
     * @var Illuminate\Foundation\Application
     */
    public $app;

    /**
     * Name of the model that should be used to retrieve your users.
     * You may specify an specific object. Then that object will be
     * returned when calling `model()` method.
     * 
     * @var string
     */
    public $model;

    /**
     * Create a new ConfideRepository
     *
     * @return void
     */
    public function __construct()
    {
        $this->app = app();
    }

    /**
     * Returns the model set in auth config
     *
     * @return mixed Instantiated object of the 'auth.model' class
     */
    public function model()
    {
        if (! $this->model)
        {               
            $this->model = $this->app['config']->get('auth.model');
        }

        if(is_object($this->model))
        {
            return $this->model;
        }
        elseif(is_string($this->model))
        {
            return new $this->model;
        }

        throw new \Exception("Model not specified in config/auth.php", 639);
    }

    /**
     * Set the user confirmation to true.
     *
     * @param string $code
     * @return bool
     */
    public function confirm( $code )
    {
        $user = $this->model()->where('confirmation_code', '=', $code)->get()->first();
        if( $user )
        {
            return $user->confirm();
        }
        else
        {
            return false;
        }
    }

    /**
     * Find a user by the given email
     * 
     * @param  string $email The email to be used in the query
     * @return ConfideUser   User object
     */
    public function getUserByMail( $email )
    {
        $user = $this->model()->where('email', '=', $email)->get()->first();

        return $user;
    }

    /**
     * Find a user by it's credentials. Perform a 'where' within
     * the fields contained in the $identityColumns.
     * 
     * @param  array $credentials      An array containing the attributes to search for
     * @param  mixed $identityColumns  Array of attribute names or string (for one atribute)
     * @return ConfideUser             User object
     */
    public function getUserByIdentity( $credentials, $identityColumns = array('email') )
    {
        if(empty($credentials))
        {
            return null;
        }

        $identityColumns = (array)$identityColumns;

        $user = $this->model();

        $first = true;
        $hasWhere = false;

        foreach ($identityColumns as $attribute) {
            
            if(isset($credentials[$attribute]))
            {
                $hasWhere = true;

                if($first)
                {
                    $user = $user->where($attribute, $credentials[$attribute]);        
                    $first = false;
                }
                else
                {
                    $user = $user->orWhere($attribute, $credentials[$attribute]);        
                }
            }            
            else
            {
                continue;
            }
        }

        if($hasWhere)
	{
	    $user = $user->get();
      
            if(! empty($user)) 
            {
                return $user->first();
            }

	}
	    
        return null;
    }

    /**
     * Get password reminders count by the given token
     * 
     * @param  string $token
     * @return int    Password reminders count
     */
    public function getPasswordRemindersCount( $token )
    {
        $count = $this->app['db']->connection()->table('password_reminders')
            ->where('token','=',$token)->count();

        return $count;
    }

    /**
     * Get email of password reminder by the given token
     * 
     * @param  string $token
     * @return string Email
     */
    public function getEmailByReminderToken( $token )
    {
        $email = $this->app['db']->connection()->table('password_reminders')
            ->select('email')->where('token','=',$token)
            ->first();

        if ($email && is_object($email))
        {
            $email = $email->email;
        }
        elseif ($email && is_array($email))
        {
            $email = $email['email'];
        }

        return $email;
    }

    /**
     * Remove password reminder from database by the given token
     * 
     * @param  string $token
     * @return void
     */
    public function deleteEmailByReminderToken( $token )
    {
        $this->app['db']->connection()->table('password_reminders')
            ->select('email')->where('token','=',$token)
            ->delete();
    }

    /**
     * Change the password of the given user. Make sure to hash
     * the $password before calling this method.
     * 
     * @param  ConfideUser $user     An existent user
     * @param  string      $password The password hash to be used
     * @return boolean Success
     */
    public function changePassword( $user, $password )
    {
        $usersTable = $user->getTable();
        $id = $user->getKey();
        $idColumn = $user->getKeyName();

        $this->app['db']->connection()->table($usersTable)
            ->where($idColumn,$id)->update(array('password'=>$password));
        // I.E: DB::table('users')->where('id',3)->update(array('password'=>$password));
        
        return true;
    }

    /**
     * Generate a token for password change and saves it in
     * the 'password_reminders' table with the email of the
     * user.
     * 
     * @param  ConfideUser $user     An existent user
     * @return string Password reset token
     */
    public function forgotPassword( $user )
    {
        $token = md5( uniqid(mt_rand(), true) );

        $values = array(
            'email'=> $user->email,
            'token'=> $token,
            'created_at'=> new \DateTime
        );

        $this->app['db']->connection()->table('password_reminders')
            ->insert( $values );
        // I.E:
        //     DB::table('password_reminders')->insert(array(
        //    'email'=> $this->email,
        //    'token'=> $token,
        //    'created_at'=> new \DateTime
        //));
        
        return $token;
    }

    /**
     * Checks if an non saved user has duplicated credentials
     * (email and/or username)
     * 
     * @param  ConfideUser  $user The non-saved user to be checked
     * @return int          The number of duplicated entry founds. Probably 0 or 1.
     */
    public function userExists( $user )
    {
        $usersTable = $user->getTable();

        $query = $this->app['db']->connection()->table($usersTable)
            ->where('email',$user->email);

        if($user->username)
        {
            $query = $query->orWhere('username',$user->username);
        }

        $count = $query->count();
        // I.E: DB::table('users')->where('email', 'bob@sample.com')->orWhere('username', 'bob')->count();
        
        return $count;
    }

    /**
     * Set the 'confirmed' column of the given user to 1
     * 
     * @param  ConfideUser $user     An existent user
     * @return boolean Success
     */
    public function confirmUser( $user )
    {
        $usersTable = $user->getTable();
        $id = $user->getKey();
        $idColumn = $user->getKeyName();

        $this->app['db']->connection()->table($usersTable)
            ->where($idColumn,$id)->update(array('confirmed'=>1));
        // I.E: DB::table('users')->where('id',3)->update(array('confirmed'=>1));
        
        return true;
    }

    public function validate($user, array $rules = array(), array $customMessages = array())
    {
        return $user->validate($rules, $customMessages);
    }

}
