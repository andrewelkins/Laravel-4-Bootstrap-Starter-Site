<?php
namespace api\v1;

use ApiController;
use UserRepositoryInterface;
use Input;
use View;
use Auth;
use Redirect;

class UserController extends ApiController {

	/**
     * User Repository Interface
     *
     * @var UserRepositoryInterface
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * Inject the repository interfaces.
     *
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

	/**
	 * Display a listing of the users.
	 *
	 * Response to a GET request to api/v1/user
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->users->findAll();
	}

	/**
	 * Get a blank user for creation.
	 *
	 * Response to a GET request to api/v1/user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		// If we are already authentified, redirect to the index.
		// if(Auth::user()) return Redirect::action('api\v1\UserController@index');

		return $this->users->instance();
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * Response to a POST request to api/v1/user
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->users->store(Input::all());
	}

	/**
	 * Return the object of the specified user.
	 *
	 * Response to a GET request to api/v1/user/$id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->users->findById($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->users->findById($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Object
	 */
	public function update($id)
	{
        return $this->users->update($id, Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->users->destroy($id);
	}

}