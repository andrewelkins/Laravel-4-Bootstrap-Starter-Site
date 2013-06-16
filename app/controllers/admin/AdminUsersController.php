<?php

class AdminUsersController extends AdminController {

    /**
     * User Model
     *
     * @var Users
     */
    protected $users;

    /**
     * Role Model
     *
     * @var Roles
     */
    protected $roles;

    /**
     * Permission Model
     *
     * @var Permissions
     */
    protected $permissions;

    /**
     * Inject the models.
     *
     * @param User $users
     * @param Role $roles
     * @param Permission $permissions
     */
    public function __construct(UserRepositoryInterface $users, Role $roles, Permission $permissions)
    {
        parent::__construct();
        $this->users = $users;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Display a listing of the users.
     *
     * @return View
     */
    public function index()
    {
        // Set the page title.
        $title = Lang::get('admin/users/title.user_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the data method.
        return View::make('admin/users.index', compact('title'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create()
    {
        // All roles
        $roles = $this->roles->all();

        // Title
        $title = Lang::get('admin/users/title.create_a_new_user');

        // Show the page
        return View::make('admin/users/create', compact('roles', 'title'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Redirect to the user page or the create method if validation does not pass.
     */
    public function store()
    {
        $this->users->store( Input::all() );
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Method
     */
    public function show($id)
    {
        if ( $user->id )
        {
            return $this->edit($id);
        }
        else
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $user = $this->users->findById($id);

        if ( $user->id )
        {
            // Get the user roles.
            $roles = $this->roles->all();

            // Set the page title.
            $title = Lang::get('admin/users/title.user_update');

            return View::make('admin/users/edit', compact('user', 'roles', 'title'));
        }
        else
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Validate the inputs
        $validator = Validator::make(Input::all(), $user->getUpdateRules());


        if ($validator->passes())
        {
            $oldUser = clone $user;
            $user->username = Input::get( 'username' );
            $user->email = Input::get( 'email' );
            $user->confirmed = Input::get( 'confirm' );

            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $user->password_confirmation = $passwordConfirmation;
                } else {
                    // Redirect to the new user page
                    return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
                }
            } else {
                unset($user->password);
                unset($user->password_confirmation);
            }

            $user->prepareRules($oldUser, $user);

            // Save if valid. Password field will be hashed before save
            $user->amend();

            // Save roles. Handles updating.
            $user->saveRoles(Input::get( 'roles' ));
        }

        // Get validation errors (see Ardent package)
        $error = $user->errors()->all();

        if(empty($error)) {
            // Redirect to the new user page
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('success', Lang::get('admin/users/messages.edit.success'));
        } else {
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.edit.failure'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $users = User::leftjoin('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
                    ->leftjoin('roles', 'roles.id', '=', 'assigned_roles.role_id')
                    ->select(array('users.id', 'users.username','users.email', 'roles.name as rolename', 'users.confirmed', 'users.created_at'));

        return Datatables::of($users)
        // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')

        ->edit_column('confirmed','@if($confirmed)
                            Yes
                        @else
                            No
                        @endif')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/users/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                @if($username == \'admin\')
                                @else
                                    <a href="{{{ URL::to(\'admin/users/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-mini btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
                                @endif
            ')

        ->remove_column('id')

        ->make();
    }

}