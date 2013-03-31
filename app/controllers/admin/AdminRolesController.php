<?php

class AdminRolesController extends AdminController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // Grab all the groups
        $roles = Role::paginate(10);

        // Show the page
        return View::make('admin/roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        // Get all the available permissions
        $permissions = Role::getAvailablePermissions();

        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());

        // Show the page
        return View::make('admin/roles/create', compact('permissions', 'selectedPermissions'));
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

            $role = new Role;
            $role->name = $inputs['name'];
            $role->permissions = $role->preparePermissionsForSave($inputs['permissions']);
            $role->save();

            // Was the group created?
            if ($role->id)
            {
                // Redirect to the new group page
                return Redirect::to('admin/roles/' . $role->id . '/edit')->with('success', Lang::get('admin/roles/messages.create.success'));
            }

            // Redirect to the new group page
            return Redirect::to('admin/roles/create')->with('error', Lang::get('admin/roles/messages.create.error'));

            // Redirect to the group create page
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
     * @param $id
     * @return Response
     */
    public function getEdit($id)
    {
        // Get the group information
        $role = Role::find($id);
        if(! empty($role))
        {
            // Get all the available permissions
            $permissions = Role::getAvailablePermissions();

            // Get this role's permissions
            $rolePermissions = $role->preparePermissionsForDisplay($role->permissions);
        }
        else
        {
            // Redirect to the groups management page
            return Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.does_not_exist'));
        }

        // Show the page
        return View::make('admin/roles/edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return Response
     */
    public function postEdit($id)
    {
        // Get the group information
        $role = Role::find($id);

        if( empty($role->id) )
        {
            // Redirect to the groups management page
            return Rediret::to('admin/roles')->with('error', Lang::get('admin/roles/messages.does_not_exist'));
        }

        // Declare the rules for the form validation
        $rules = array(
            'name' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the group data
            $role->name        = Input::get('name');
            $role->permissions = $role->preparePermissionsForSave(Input::get('permissions'));

            // Was the group updated?
            if ($role->save())
            {
                // Redirect to the group page
                return Redirect::to('admin/roles/' . $id . '/edit')->with('success', Lang::get('admin/roles/messages.update.success'));
            }
            else
            {
                // Redirect to the group page
                return Redirect::to('admin/roles/' . $id . '/edit')->with('error', Lang::get('admin/roles/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/roles/' . $id . '/edit')->withInput()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function getDelete($id)
    {
        // Get the group information
        $role = Role::find($id);

        if(! empty( $role->id ))
        {

            // Was the group deleted?
            if($role->delete())
            {
                // Redirect to the group management page
                return Redirect::to('admin/roles')->with('success', Lang::get('admin/roles/messages.delete.success'));
            }

            // There was a problem deleting the group
            return Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.delete.error'));
        }
        else
        {

            // Redirect to the group management page
            return Redirect::to('admin/roles')->with('error', Lang::get('admin/roles/messages.not_found'));
        }
    }

}