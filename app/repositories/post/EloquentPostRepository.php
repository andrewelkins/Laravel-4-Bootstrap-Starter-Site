<?php

/**
 * Repository for the Post model
 */
class EloquentPostRepository implements PostRepositoryInterface {

	/**
	 * Display the specified post.
     *
	 * @param  int $id ID of the post.
	 * @return object     returns the $post or a redirect to the admin index if no post is found.
	 */
	public function findById($id)
    {
        // Look for a post with the corresponding ID.
        $post = Post::where('id', $id)->first();

        if (!$post) {
            // No post found.
        	Redirect::to('admin/posts')
                ->with('error', Lang::get('admin/posts/messages.does_not_exist'))
                ->send();
        	exit;
        }

        // Return our post.
        return $post;
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  input from POST $data POST data from the create form.
     * @return redirect       redirect to the admin edit page of the new post, or back to the form in case of validation error.
     */
    public function store($data)
    {
        // Get the user storing this post
        $user = Auth::user();
        $data['user_id'] = $user->id;

        // Generate the slug for the post
        $data['slug'] = Str::slug(Input::get('title'));

    	// Validate the input.
    	$validator = Validator::make($data, Post::$rules);

    	if ($validator->fails()) {
            // Redirect back to the post create form with input and errors.
            return Redirect::to('admin/posts/create')
                ->withInput($data)
                ->withErrors($validator)
                ->send();
    		exit;
    	}

        // Save the new post
        $post = Post::create($data);

        // Redirect to the admin edit page of the post.
        Redirect::to('admin/posts/' . $post->id . '/edit')
            ->with('success', Lang::get('admin/posts/messages.create.success'))
            ->send();
        exit;
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int $id   ID of the post.
     * @param  input from PUT $data data from the edit form.
     * @return redirect       [description]
     */
	public function update($id, $data)
	{
        // Find the post.
		$post = $this->findById($id);

		// Validate the input.
    	$validator = Validator::make($data, Post::$updateRules);

        if($validator->fails()) {
            Redirect::to('admin/posts/' . $post->id . '/edit')
                ->withInput($data)
                ->withErrors($validator)
                ->send();
            exit;
        }

        // Save if valid.
        $post->update($data);

        // Redirect to the newly created post admin edit page.
        Redirect::to('admin/posts/' . $post->id . '/edit')
        	->with('success', Lang::get('admin/posts/messages.update.success'))
        	->send();
        exit;
	}

    /**
     * Remove the specified post from storage.
     *
     * @param  int $id ID of the post.
     * @return Redirect     Message regarding the results of the deletion.
     */
    public function destroy($id)
    {
        // Find the post.
        $post = $this->findById($id);

        // Delete the comments
        $post->comments()->delete();

        // Delete the post.
        $post->delete();

        // Check for deletion and redirect.
        if (!Post::find($id)) {
            Redirect::to('admin/posts')
                ->with('success', Lang::get('admin/posts/messages.delete.success'))
                ->send();
        } else {
            Redirect::to('admin/posts')
                ->with('error', Lang::get('admin/posts/messages.delete.error'))
                ->send();
        }
    }

    /**
     * Show a list of all the posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $posts = Post::leftjoin('comments', 'comments.post_id', '=', 'posts.id')
                    ->leftjoin('users', 'users.id', '=' , 'posts.user_id')
                    ->select(array('posts.id', 'posts.title', 'comments.post_id as comments', 'users.username as poster', 'posts.created_at'));


        return Datatables::of($posts)
        //->add_column(Lang::get('admin/blogs/table.comments'), '{{ DB::raw('COUNT(posts.id) AS posts') }}')
        ->edit_column('comments', '{{ DB::table(\'comments\')->where(\'post_id\', \'=\', $id)->count() }}')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/posts/\' . $id . \'/edit\' ) }}}"
                                    class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="#delete-modal"
                                    class="delForm btn btn-mini btn-danger"
                                    data-toggle="modal"
                                    data-id="{{{ $id }}}"
                                    data-title="{{{ $title }}}">{{{ Lang::get(\'button.delete\') }}}</a>
        ')

        ->remove_column('id')

        ->make();
    }
}