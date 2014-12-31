<?php

class PostV2Controller extends \APIController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $post;
    public function __construct(Post $post)
    {
        parent::__construct();
        $this->post         = $post;
    }
	public function index()
	{
        try{
            $statusCode = 200;
            $builder = ApiHandler::parseMultiple($this->post, array('title','content'), $this->passParams('posts'));
            $objects = $builder->getResult();
            $response = [];

            foreach($objects as $object){
                $response[] = $this->responseMap($object);
            }

            return $this->makeResponse($response,$statusCode, $builder);
        } catch (Exception $e){
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
                'title'   => 'required|min:3',
                'content' => 'required|min:3'
            );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes())
            {
                // Create a new blog post
                $user = Auth::user();

                // Update the blog post data
                $this->post->title            = Input::get('title');
                $this->post->slug             = Str::slug(Input::get('title'));
                $this->post->content          = Input::get('content');
                $this->post->meta_title       = Input::get('meta_title');
                $this->post->meta_description = Input::get('meta_description');
                $this->post->meta_keywords    = Input::get('meta_keywords');
                $this->post->user_id          = $user->id;

                $this->post->save();
                return $this->show($this->post->id);

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
            $object = Post::find($id);

            $response = $this->responseMap($object);

            return Response::json($response,$statusCode);

        }catch (Exception $e){
            $statusCode = 500;
            return Response::json($e->getMessage(), $statusCode);
        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        try {
            $rules = array(
                'title'   => 'required|min:3',
                'content' => 'required|min:3'
            );

            $validator = Validator::make(Input::all(), $rules);
            $post = $this->post->findOrFail($id);
            if ($validator->passes())
            {
                // Create a new blog post
                $user = Auth::user();

                // Update the blog post data
                $post->title            = Input::get('title');
                $post->slug             = Str::slug(Input::get('title'));
                $post->content          = Input::get('content');
                $post->meta_title       = Input::get('meta_title');
                $post->meta_description = Input::get('meta_description');
                $post->meta_keywords    = Input::get('meta_keywords');
                $post->user_id          = $user->id;

                $post->save();
                return $this->show($post->id);

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
            $object = $this->post->findOrFail($id);
            $object->delete();

            $response = "Deleted Post ID $id";
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
            'id'                => $object->id,
            'title'             => $object->title,
            'user_id'           => $object->user_id,
            'content'           => $object->content,
            'meta_keywords'     => $object->meta_keywords,
            'meta_description'  => $object->meta_description,
            'meta_title'        => $object->meta_title,
            'created_at'        => $object->created_at,
        ];
    }

}
