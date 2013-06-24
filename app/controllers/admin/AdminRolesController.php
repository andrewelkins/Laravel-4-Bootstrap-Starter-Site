<?php

class AdminRolesController extends AdminController {

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
     * @var Permission
     */
    protected $permissions;

    /**
     * Inject the models.
     * @param User $users
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
     * Display a listing of the roles.
     *
     * @return View
     */
    public function index()
    {
        // Set the page title.
        $title = Lang::get('admin/roles/title.role_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin.roles.index', compact('title'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return View
     */
    public function create()
    {
        // Get all the available permissions
        $permissions = $this->permissions->all();

        // Set the page title.
        $title = Lang::get('admin/roles/title.create_a_new_role');

        // Show the create role form page.
        return View::make('admin/roles/create', compact('permissions', 'title'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @return Redirect to the role page or the create method if validation does not pass.
     */
    public function store()
    {
        // Create a role with the POST request data.
        $this->roles->store( Input::all() );
    }

    /**
     * Display the specified role.
     *
     * @param  int  $id
     * @return Method
     */
    public function show($id)
    {
        $role = $this->roles->findById($id);

        return $this->edit($id);

    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        // Check if we have a user with this $id.
        $role = $this->roles->findById($id);

        // Get all the available permissions
        $permissions = $this->permissions->all();

        // Set the page title.
        $title = Lang::get('admin/roles/title.role_update');

        // Show the edit form page.
        return View::make('admin/roles/edit', compact('role', 'permissions', 'title'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Update the role with the PUT request data.
        $this->roles->update($id, Input::all());
    }

    /**
     * Remove the specified role from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // Delete a role with the corresponding ID.
        $this->roles->destroy($id);
    }

    /**
     * Show a list of roles formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $data = $this->roles->data();

        return $data;
    }









    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        // Get all the available permissions
        $permissions = $this->permission->all();

        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());

        // Title
        $title = Lang::get('admin/roles/title.create_a_new_role');

        // Show the page
        return View::make('admin/roles/create', compact('permissions', 'selectedPermissions', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {

        // Declare the rules for the form validation
        $rules = array(
            'name' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);
        // Check if the form validates with success
        if ($validator->passes())
        {
            // Get the inputs, with some exceptions
            $inputs = Input::except('csrf_token');

            $this->role->name = $inputs['name'];
            $this->role->save();

            // Save permissions
            $this->role->perms()->sync($this->permission->preparePermissionsForSave($inputs['permissions']));

            // Was the role created?
            if ($this->role->id)
            {
                // Redirect to the new role page
                return Redirect::to('admin/roles/' . $this->role->id . '/edit')->with('success', Lang::get('admin/roles/messages.create.success'));
            }

            // Redirect to the new role page
            return Redirect::to('admin/roles/create')->with('error', Lang::get('admin/roles/messages.create.error'));

            // Redirect to the role create page
            return Redirect::to('admin/roles/create')->withInput()->with('error', Lang::get('admin/roles/messages.' . $error));
        }

        // Form validation failed
        return Redirect::to('admin/roles/create')->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function getShow($id)
    {
        // redirect to the frontend
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $role
     * @return Response
     */
    public function getEdit($role)
    {
        if(! empty($role))
        {
            $permissions = $this->permission->preparePermissionsForDisplay($role->perms()->get());
        }
        else
        {
            // Redirect to the roles management page
            return Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.does_not_exist'));
        }

        // Title
        $title = Lang::get('admin/roles/title.role_update');

        // Show the page
        return View::make('admin/roles/edit', compact('role', 'permissions', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $role
     * @return Response
     */
    public function postEdit($role)
    {
        // Declare the rules for the form validation
        $rules = array(
            'name' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the role data
            $role->name        = Input::get('name');
            $role->perms()->sync($this->permission->preparePermissionsForSave(Input::get('permissions')));

            // Was the role updated?
            if ($role->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/roles/' . $role->id . '/edit')->with('success', Lang::get('admin/roles/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/roles/' . $role->id . '/edit')->with('error', Lang::get('admin/roles/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/roles/' . $role->id . '/edit')->withInput()->withErrors($validator);
    }


    /**
     * Remove role page.
     *
     * @param $role
     * @return Response
     */
    public function getDelete($role)
    {
        // Title
        $title = Lang::get('admin/roles/title.role_delete');

        // Show the page
        return View::make('admin/roles/delete', compact('role', 'title'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param $role
     * @internal param $id
     * @return Response
     */
    public function postDelete($role)
    {
            // Was the role deleted?
            if($role->delete()) {
                // Redirect to the role management page
                return Redirect::to('admin/roles')->with('success', Lang::get('admin/roles/messages.delete.success'));
            }

            // There was a problem deleting the role
            return Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.delete.error'));
    }

    /**
     * Show a list of all the roles formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $roles = Role::select(array('roles.id',  'roles.name', 'roles.id as users', 'roles.created_at'));

        return Datatables::of($roles)
        // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')
        ->edit_column('users', '{{{ DB::table(\'assigned_roles\')->where(\'role_id\', \'=\', $id)->count()  }}}')


        ->add_column('actions', '<a href="{{{ URL::to(\'admin/roles/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="{{{ URL::to(\'admin/roles/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-mini btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
                    ')

        ->remove_column('id')

        ->make();
    }

}