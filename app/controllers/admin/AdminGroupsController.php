<?php

class AdminGroupsController extends AdminController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Grab all the groups
        $groups = Group::paginate(10);

        // Show the page
        return View::make('admin/groups/index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Get all the available permissions
        $permissions = $this->permissions;

        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());

        // Show the page
        return View::make('admin/groups/create', compact('permissions', 'selectedPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
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
            try
            {
                // Get the inputs, with some exceptions
                $inputs = Input::except('csrf_token');

                // Was the group created?
                if ($group = Sentry::getGroupProvider()->create($inputs))
                {
                    // Redirect to the new group page
                    return Redirect::to('admin/groups/' . $group->id . '/edit')->with('success', Lang::get('admin/groups/messages.create.success'));
                }

                // Redirect to the new group page
                return Redirect::to('admin/groups/create')->with('error', Lang::get('admin/groups/messages.create.error'));
            }
            catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
            {
                $error = 'name_required';
            }
            catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
            {
                $error = 'already_exists';
            }

            // Redirect to the group create page
            return Redirect::to('admin/groups/create')->withInput()->with('error', Lang::get('admin/groups/messages.' . $error));
        }

        // Form validation failed
        return Redirect::to('admin/groups/create')->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($id)
    {
        // redirect to the frontend
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        try
        {
            // Get the group information
            $group = Sentry::getGroupProvider()->findById($id);

            // Get all the available permissions
            $permissions = $this->permissions;

            // Get this group permissions
            $groupPermissions = $group->getPermissions();
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            // Redirect to the groups management page
            return Redirect::to('admin/groups')->with('error', Lang::get('admin/groups/messages.does_not_exist'));
        }

        // Show the page
        return View::make('admin/groups/edit', compact('group', 'permissions', 'groupPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id)
    {
        try
        {
            // Get the group information
            $group = Sentry::getGroupProvider()->findById($id);
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            // Redirect to the groups management page
            return Rediret::to('admin/groups')->with('error', Lang::get('admin/groups/messages.does_not_exist'));
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
            try
            {
                // Update the group data
                $group->name        = Input::get('name');
                $group->permissions = Input::get('permissions');

                // Was the group updated?
                if ($group->save())
                {
                    // Redirect to the group page
                    return Redirect::to('admin/groups/' . $id . '/edit')->with('success', Lang::get('admin/groups/messages.update.success'));
                }
                else
                {
                    // Redirect to the group page
                    return Redirect::to('admin/groups/' . $id . '/edit')->with('error', Lang::get('admin/groups/messages.update.error'));
                }
            }
            catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
            {
                $error = Lang::get('admin/group/messages.name_required');
            }

            // Redirect to the group page
            return Redirect::to('admin/groups/' . $id . '/edit')->withInput()->with('error', $error);
        }

        // Form validation failed
        return Redirect::to('admin/groups/' . $id . '/edit')->withInput()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy($id)
    {
        try
        {
            // Get group information
            $group = Sentry::getGroupProvider()->findById($id);

            // Was the group deleted?
            if($group->delete())
            {
                // Redirect to the group management page
                return Redirect::to('admin/groups')->with('success', Lang::get('admin/group/messages.delete.success'));
            }

            // There was a problem deleting the group
            return Redirect::to('admin/groups')->with('error', Lang::get('admin/groups/messages.delete.error'));
        }
        catch (Exception $e)
        {
            // Redirect to the group management page
            return Redirect::to('admin/groups')->with('error', Lang::get('admin/groups/messages.not_found'));
        }
    }

}