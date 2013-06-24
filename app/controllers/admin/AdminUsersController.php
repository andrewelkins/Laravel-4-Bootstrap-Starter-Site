<?php

class AdminUsersController extends AdminController {

    /**
     * User Repository Interface
     *
     * @var User
     */
    protected $users;

    /**
     * Role Repository Interface
     *
     * @var Role
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
     * @param UserRepositoryInterface $users
     * @param Role $roles
     * @param Permission $permissions
     */
    public function __construct(UserRepositoryInterface $users, RoleRepositoryInterface $roles, Permission $permissions)
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
        // The datatables will be calling the getData method.
        return View::make('admin.users.index', compact('title'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create()
    {
        // All possible roles.
        $roles = $this->roles->findAll();

        // Set the page title.
        $title = Lang::get('admin/users/title.create_a_new_user');

        // Show the create user form page.
        return View::make('admin/users/create', compact('roles', 'title'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Redirect to the user page or the create method if validation does not pass.
     */
    public function store()
    {
        // Create a user with the POST request data.
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
        $user = $this->users->findById($id);

        return $this->edit($id);

    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        // Check if we have a user with this $id.
        $user = $this->users->findById($id);

        // All possible roles.
        $roles = $this->roles->findAll();

        // Set the page title.
        $title = Lang::get('admin/users/title.user_update');

        // Show the edit form page.
        return View::make('admin/users/edit', compact('user', 'roles', 'title'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Update the user with the PUT request data.
        $this->users->update($id, Input::all());
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // Delete a user with the corresponding ID.
        $this->users->destroy($id);
    }

    /**
     * Show a list of users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $data = $this->users->data();

        return $data;
    }
}