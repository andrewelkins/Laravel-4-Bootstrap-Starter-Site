<?php
use \ApiHandler;
class RolesV2Controller extends \APIController {

    protected $user;
    protected $role;
    protected $permission;

    public function __construct(User $user, Role $role, Permission $permission)
    {
        parent::__construct();
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        try{
            $statusCode = 200;
            // dd($this->passParams('roles'));
            $builder = ApiHandler::parseMultiple($this->role->with('perms'), array(), $this->passParams('roles'));
            $roles = $builder->getResult();

            $response = [];
            foreach($roles as $role){
                $response[] = $this->responseMap($role);
            }
            return $this->makeResponse($response,$statusCode, $builder);
        }catch (Exception $e){
            $statusCode = 500;
            $message = $e->getMessage();
            return Response::json($message, $statusCode);
        }
    }

    public function show($id)
    {
        try{
            $statusCode = 200;
            $role = $this->role->find($id);

            $response = $this->responseMap($role, true);

            return Response::json($response, $statusCode);
        }catch (Exception $e){
            $statusCode = 500;
            return Response::json($e->getMessage(), $statusCode);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = array(
            'name' => 'required|min:3',
            'permissions' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes())
        {
            $inputs = Input::except('csrf_token');
            $this->role->name = $inputs['name'];
            $this->role->save();
            $this->role->perms()->sync($inputs['permissions']);

            // Was the role created?
            if ($this->role->id)
            {
                return $this->show($this->role->id);
            } else {
                $statusCode = 500;
                $message = 'Something happen from our server';
            }
        } else {
            $statusCode = 400;
            $messages = $validator->messages();
        }
        return Response::json($messages, $statusCode);
    }
    public function update($id)
    {
        $role = $this->role->findOrFail($id);
        $rules = array(
            'name' => 'required|min:3',
            'permissions' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes())
        {
            $inputs = Input::except('csrf_token');
            $role->name = $inputs['name'];
            $role->save();
            $role->perms()->sync($inputs['permissions']);

            return $this->show($role->id);
        } else {
            $statusCode = 400;
            $messages = $validator->messages();
        }
        return Response::json($messages, $statusCode);
    }

    public function destroy($id)
    {
        try
        {
            $role = $this->role->findOrFail($id);
            if ($role->assigned_role()->count() > 0)
                throw new Exception ('This Role was assigned to user(s). CAN NOT delete');
            else
                $role->delete();

        } catch (Exception $e){
            $statusCode = 400;
            $error = $e->getMessage();
            return Response::json($error, $statusCode);
        }
    }

    private function responseMap($object, $show = false)
    {
        /*
         * Prevent multi pivot table query on listView (which is useless)
         */
        $return = [
            'id'            => $object->id,
            'name'          => $object->name,
            'count'         => $object->assigned_role()->count(),
            'created_at'    => $object->created_at,
        ];
        if ($show)
        {
            $return['permissions'] = $object->perms()->get()->modelKeys();
        }
        return $return;
    }
}
