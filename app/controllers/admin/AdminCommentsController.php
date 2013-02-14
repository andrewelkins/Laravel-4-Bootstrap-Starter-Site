<?php

class AdminBlogsController extends AdminController {


    /**
     * Show a list of all the blog posts.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the blog posts
        $comments = Comment::orderBy('created_at', 'DESC')->paginate(10);

        // Show the page
        return View::make('admin/comments/index', compact('comments'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Show the page
        return View::make('admin/comments/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new blog post
            $post = new Post;

            // Update the blog post data
            $post->title            = Input::get('title');
            $post->slug             = Str::slug(Input::get('title'));
            $post->content          = Input::get('content');
            $post->meta_title       = Input::get('meta-title');
            $post->meta_description = Input::get('meta-description');
            $post->meta_keywords    = Input::get('meta-keywords');
            $post->user_id          = Sentry::getId();

            // Was the blog post created?
            if($post->save())
            {
                // Redirect to the new blog post page
                return Redirect::to('admin/comments/' . $post->id . '/edit')->with('success', Lang::get('admin/comments/messages.create.success'));
            }

            // Redirect to the blog post create page
            return Redirect::to('admin/comments/create')->with('error', Lang::get('admin/comments/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/comments/create')->withInput()->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function getShow($id)
	{
        // redirect to the frontend
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function getEdit($id)
	{

        // Check if the blog post exists
        if (is_null($post = Post::find($id)))
        {
            // Redirect to the blogs management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.does_not_exist'));
        }

        // Show the page
        return View::make('admin/comments/edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function postEdit($id)
	{
        // Check if the blog post exists
        if (is_null($post = Post::find($id)))
        {
            // Redirect to the blogs management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.does_not_exist'));
        }

        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the blog post data
            $post->title            = Input::get('title');
            $post->slug             = Str::slug(Input::get('title'));
            $post->content          = Input::get('content');
            $post->meta_title       = Input::get('meta-title');
            $post->meta_description = Input::get('meta-description');
            $post->meta_keywords    = Input::get('meta-keywords');

            // Was the blog post updated?
            if($post->save())
            {
                // Redirect to the new blog post page
                return Redirect::to('admin/comments/' . $id . '/edit')->with('success', Lang::get('admin/comments/messages.update.success'));
            }

            // Redirect to the blogs post management page
            return Redirect::to('admin/comments/' . $id . '/edit')->with('error', Lang::get('admin/comments/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/comments/' . $id . '/edit')->withInput()->withErrors($validator);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function postDelete($id)
	{

        // Check if the blog post exists
        if (is_null($post = Post::find($id)))
        {
            // Redirect to the blogs management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.not_found'));
        }

        // Was the blog post deleted?
        if($post->delete())
        {
            // Redirect to the blog posts management page
            return Redirect::to('admin/comments')->with('success', Lang::get('admin/comments/messages.delete.success'));
        }

        // There was a problem deleting the blog post
        return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.delete.error'));
	}

}