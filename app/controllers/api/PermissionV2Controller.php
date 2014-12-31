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
        try {
            $rules = array(
                'name'          => 'required|min:3|unique:permissions,name',
                'display_name'  => 'required|min:3',
            );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes())
            {

                $this->permission->name         = Input::get('name');
                $this->permission->display_name = Input::get('display_name');

                $this->permission->save();
                return $this->show($this->permission->id);

            } else {
                $statusCode = 400;
                $message = $validator->messages();
                return Response::json($message, $statusCode);
            }
        } catch (Exception $e){
            $statusCode = 500;
            $message = $e->getMessage();
            return Response::json($message, $statusCode);
        }
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
	 * Update the specified resource in storage.
	 *
     * @method PUT
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            $rules = array(
                'name'          => 'required|min:3',
                'display_name'  => 'required|min:3',
            );

            $validator = Validator::make(Input::all(), $rules);
            $permission = $this->permission->findOrFail($id);
            if ($validator->passes())
            {

                $permission->name         = Input::get('name');
                $permission->display_name = Input::get('display_name');

                $permission->save();
                return $this->show($permission->id);

            } else {
                $statusCode = 400;
                $message = $validator->messages();
                return Response::json($message, $statusCode);
            }
        } catch (Exception $e){
            $statusCode = 500;
            $message = $e->getMessage();
            return Response::json($message, $statusCode);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try{
            $statusCode = 200;
            $object = $this->permission->findOrFail($id);
            $object->delete();

            $response = "Deleted Permission ID $id";
            return Response::json($response,$statusCode);

        }catch (Exception $e){
            $statusCode = 500;
            $error = $e->getMessage();
            return Response::json($error, $statusCode);
        }
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
