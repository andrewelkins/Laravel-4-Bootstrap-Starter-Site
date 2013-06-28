<?php
namespace api\v1;

use ApiController;
use RoleRepositoryInterface;
use Input;
use View;
use Auth;
use Redirect;

class RoleController extends ApiController {

	/**
     * Role Repository Interface
     *
     * @var RoleRepositoryInterface
     */
    protected $roles;

    /**
     * Create a new controller instance.
     *
     * Inject the repository interfaces.
     *
     * @param RoleRepositoryInterface $roles
     */
    public function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

	/**
	 * Display a listing of the roles.
	 *
	 * Response to a GET request to api/v1/role
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->roles->findAll();
	}

	/**
	 * Get a blank role for creation.
	 *
	 * Response to a GET request to api/v1/role/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->roles->instance();
	}

	/**
	 * Store a newly created role in storage.
	 *
	 * Response to a POST request to api/v1/role
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->roles->store(Input::all());
	}

	/**
	 * Return the object of the specified role.
	 *
	 * Response to a GET request to api/v1/role/$id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->roles->findById($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->roles->findById($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Object
	 */
	public function update($id)
	{
        return $this->roles->update($id, Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->roles->destroy($id);
	}

}