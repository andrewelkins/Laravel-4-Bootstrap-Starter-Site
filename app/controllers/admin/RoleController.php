<?php
namespace admin;

use BaseController;
use RoleRepositoryInterface;
use Role;
use Permission;
use Lang;
use View;
use Redirect;
use Input;
use Datatables;

/*
|--------------------------------------------------------------------------
| Admin Role Controller
|--------------------------------------------------------------------------
|
| User resource management.
|
*/

class RoleController extends BaseController {

    /**
	* Role Repository Interface
	*
	* @var Role
	*/
    protected $roles;

    /**
	* Permission Model
	*
	* @var Permission
	*/
    protected $permissions;

    /**
	* Create a new controller instance
	*
	* @param UserRepositoryInterface $users
	* @param RoleRepositoryInterface $roles
	* @param Model $permissions
	* @param Permission $permissions
	*/
    public function __construct(RoleRepositoryInterface $roles, Permission $permissions)
    {
        parent::__construct();
        $this->roles = $roles;
        $this->permissions = $permissions;
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * Display a listing of the roles
     *
     * @return View
     */
    public function index()
    {
        // Get the data needed for the view.
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/roles/title.role_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin/roles/index', compact('meta'));
    }

    /**
     * Show the form for creating a new role
     *
     * @return View
     */
    public function create()
    {
        // Get the data needed for the view.
        $permissions = $this->permissions->all();
        $rules = Role::$rules;
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/roles/title.create_a_new_role');

        // Show the create user form page.
        return View::make('admin/roles/create', compact('permissions', 'meta', 'rules'));
    }

    /**
     * Stores a new role
     *
     * @return Redirect
     */
    public function store()
    {
        $role = $this->roles->store(Input::all());

        // Handle the repository possible errors.
        if(is_array($role)) {
            $errors = $role['message'];
            return Redirect::action('admin\RoleController@create')
                            ->withErrors($errors)
                            ->withInput(Input::all());
        } else {
            // Redirect with success message.
            return Redirect::action('admin\RoleController@edit', $role->id)
                            ->with('success', Lang::get('admin/roles/messages.create.success'));
        }
    }

    /**
    * Display the specified role
    *
    * @param  int $id
    *
    * @return method We only want to edit roles in the administration.
    */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing a role
     *
     * @return View
     */
    public function edit($id)
    {

        $role = $this->roles->findById($id);

        // Handle the repository possible errors.
        if(is_array($role)) {
            return Redirect::action('admin\RoleController@index')
                            ->with('error', Lang::get('admin/roles/messages.does_not_exist'));
        }

        // Get the data needed for the view.
        $permissions = $this->permissions->preparePermissionsForDisplay($role->perms()->get());
        $rules = Role::$rules;
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/roles/title.role_update');

        // Show the edit role form page.
        return View::make('admin/roles/edit', compact('role', 'permissions', 'meta', 'rules'));
    }

    /**
    * Update the specified role
    *
    * @param int $id
    *
    * @return Response
    */
    public function update($id)
    {
        // Update the role with the PUT request data.
        $role = $this->roles->update($id, Input::all());

        // Handle the repository possible errors.
        if(is_array($role)) {
            $errors = $role['message'];
            return Redirect::action('admin\RoleController@edit', $id)
                            ->withErrors($errors)
                            ->withInput(Input::all());
        } else {
            // Redirect with success message.
            return Redirect::action('admin\RoleController@edit', $id)
                            ->with('success', Lang::get('admin/roles/messages.update.success'));
        }
    }

    /**
    * Remove the specified role
    *
    * @param int $id
    *
    * @return Response
    */
    public function destroy($id)
    {
        // Delete a role with the corresponding ID.
        $role = $this->roles->destroy($id);

        // Handle the repository possible errors.
        if(is_array($role)) {
            $errors = $role['message'];
            if ($role['code'] === '403') {
                $message = Lang::get('admin/roles/messages.delete.impossible');
            } else {
                $message = Lang::get('admin/roles/messages.delete.error');
            }
            return Redirect::action('admin\RoleController@index')
                            ->with('error', $message);
        } else {
            // Redirect with success message.
            return Redirect::action('admin\RoleController@index')
                            ->with('success', Lang::get('admin/roles/messages.delete.success'));
        }
    }

    /**
	* Show a list of roles formatted for Datatables
	*
	* @return string JSON for Datatables.
	*/
    public function data()
    {
        $roles = Role::select(array('roles.id', 'roles.name', 'roles.id as users', 'roles.created_at'));

        return Datatables::of($roles)
        // ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')
        ->edit_column('users', '{{{ DB::table(\'assigned_roles\')->where(\'role_id\', \'=\', $id)->count() }}}')


        ->add_column('actions', '<a href="{{{ URL::to(\'admin/roles/\' . $id . \'/edit\' ) }}}"
									class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                    @if($name == \'admin\')
                                    @else
                                        <a href="#delete-modal"
                                            class="delForm btn btn-mini btn-danger"
                                            data-toggle="modal"
                                            data-id="{{{ $id }}}"
                                            data-title="{{{ $name }}}">{{{ Lang::get(\'button.delete\') }}}</a>
                                    @endif
                    ')

        ->remove_column('id')

        ->make();
    }

}