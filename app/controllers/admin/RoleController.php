<?php
namespace admin;

use BaseController;
use UserRepositoryInterface;
use RoleRepositoryInterface;
use Auth;
use Lang;
use View;
use Confide;
use Redirect;
use API;
use Role;
use Input;
use Session;
use Datatables;

/*
|--------------------------------------------------------------------------
| Admin Role Controller
|--------------------------------------------------------------------------
|
| User resource management.
|
*/

class UserController extends BaseController {

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
	* @var Permission
	*/
    protected $permissions;

    /**
	* Create a new controller instance
	*
	* @param UserRepositoryInterface $users
	* @param RoleRepositoryInterface $roles
	* @param Model $permissions
	*
	* @param Permission $permissions
	*/
    public function __construct(UserRepositoryInterface $users, RoleRepositoryInterface $roles, Permission $permissions)
    {
        parent::__construct();
        $this->users = $users;
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
        return View::make('admin.roles.index', compact('meta'));
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
									<a href="#delete-modal"
									class="delForm btn btn-mini btn-danger"
									data-toggle="modal"
									data-id="{{{ $id }}}"
									data-title="{{{ $name }}}">{{{ Lang::get(\'button.delete\') }}}</a>')

        ->remove_column('id')

        ->make();
    }
    }

}