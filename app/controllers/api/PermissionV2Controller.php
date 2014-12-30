<?php
use \ApiHandler;
class PermissionV2Controller extends \APIController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $permission;
    public function __construct(Permission $permission)
    {
        parent::__construct();
        $this->permission        = $permission;
    }
	public function index()
	{

        try{
            $statusCode = 200;
           // dd($this->passParams('tests'));
            $builder = ApiHandler::parseMultiple($this->permission, array(''), $this->passParams('permissions'));
            $objects = $builder->getResult();

            $response = [];
            foreach($objects as $object){
                $response[] = $this->responseMap($object);
            }
            return $this->makeResponse($response,$statusCode, $builder);
        }catch (Exception $e){
            $statusCode = 500;
            $message = $e->getMessage();
            return Response::json($message, $statusCode);
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        try{
            $statusCode = 200;
            $test = $this->permission->find($id);

            $response = $this->responseMap($test);

            return Response::json($response, $statusCode);
        }catch (Exception $e){
            $statusCode = 500;
            return Response::json($e->getMessage(), $statusCode);
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		dd(Input::all());
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @method PUT
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return Response::json(Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $test = $this->permission->findOrFail($id);
        $test->delete();
        return 'Deleted';
	}

    private function responseMap($object)
    {
        return [
            'id'            => $object->id,
            'name'          => $object->name,
            'display_name'  => $object->display_name,
        ];
    }
}
