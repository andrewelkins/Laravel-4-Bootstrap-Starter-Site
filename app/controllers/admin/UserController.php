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
use User;
use Input;
use Session;
use Datatables;

/*
|--------------------------------------------------------------------------
| Admin User Controller
|--------------------------------------------------------------------------
|
| User resource management.
|
*/

class UserController extends BaseController {

    /**
     * User Repository Interface
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * Role Repository Interface
     *
     * @var RoleRepositoryInterface
     */
    protected $roles;

    /**
     * Create a new controller instance
     *
     * Inject the repository interfaces.
     *
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users, RoleRepositoryInterface $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * Display a listing of the users
     *
     * @return View
     */
    public function getIndex()
    {
        // Get the data needed for the view.
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/users/title.user_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin.users.index', compact('meta'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return View
     */
    public function getCreate()
    {
        // All possible roles.
        $roles = $this->roles->findAll();

        // Set the page title.
        $title = Lang::get('admin/users/title.create_a_new_user');

        // Show the create user form page.
        return View::make('admin/users/create', compact('roles', 'title'));
    }

    /**
     * Show a list of users formatted for Datatables
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
                                    <a href="#delete-modal"
                                        class="delForm btn btn-mini btn-danger"
                                        data-toggle="modal"
                                        data-id="{{{ $id }}}"
                                        data-title="{{{ $username }}}">{{{ Lang::get(\'button.delete\') }}}</a>
                                @endif
            ')

        ->remove_column('id')

        ->make();
    }
}