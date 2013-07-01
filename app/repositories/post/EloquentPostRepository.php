<?php

/**
 * Repository for the Post model using Eloquent ORM
 */
class EloquentPostRepository implements PostRepositoryInterface {

    /**
     * Return all possible posts
     *
     * @return object All posts.
     */
    public function findAll()
    {
        return Post::get();
    }

	/**
	 * Display the specified post
     *
	 * @param  int $id ID of the post.
     *
	 * @return object Specified post.
	 */
	public function findById($id)
    {
        $post = Post::find($id);

        if (!$post) {
             $error = array(
                'code'    => '404',
                'message' => 'Post Not Found'
            );
            return $error;
        }

        return $post;
    }

    /**
     * Store a new post
     *
     * @param  array $data POST data from the request.
     *
     * @return object Created post.
     */
    public function store($data)
    {
        $validator = $this->validate($data, Post::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $post = Post::create($data);

        if ($post->id) {
            // Additional data
            $user = Auth::user();
            $post->user_id = $user->id;
            $post->slug = Str::slug($data['title']);
            return $post;
        } else {
            // Should not really happen...
            $error = array(
                'code'    => '404',
                'message' => 'Could Not Create Comment'
            );
            return $error;
        }
    }

    /**
     * Update the specified post
     *
     * @param  int   $id   ID of the post.
     * @param  array $data PUT data from the request.
     *
     * @return object Updated post.
     */
	public function update($id, $data)
	{
		$post = $this->findById($id);

		$validator = $this->validate($data, Post::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $post->update($data);

        return $post;
	}

    /**
     * Delete the specified post
     *
     * @param  int $id ID of the post.
     *
     * @return int ID of the post.
     */
    public function destroy($id)
    {
        $post = $this->findById($id);

        // Clean up.
        $post->comments()->delete();

        $post->delete();

        // Check for deletion.
        if (!Post::find($id)) {
            return 'success';
        } else {
            $error = array(
                'code'    => '404',
                'message' => 'Can Not Delete User'
            );
            return $error;
        }
    }

    /**
     * Create a new post object
     *
     * @param  array  $data Post data
     *
     * @return object Post object
     */
    public function instance($data = array())
    {
        return new Post($data);
    }

    /**
     * Validate data
     *
     * @param  array $data  Data to be validated.
     * @param  array $rules Rules for validation.
     *
     * @return boot Always true if it returns.
     */
    public function validate($data, $rules)
    {
        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            $message = $validator->messages();
            $error = array(
                'code'    => '400',
                'message' => $message
            );
            return $error;
        }

        return true;
    }

}