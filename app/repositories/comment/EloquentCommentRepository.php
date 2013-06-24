<?php

/**
 * Repository for the Comment model
 */
class EloquentCommentRepository implements CommentRepositoryInterface {

	/**
	 * Display the specified comment.
     *
	 * @param  int $id ID of the comment.
	 * @return object     returns the $comment or a redirect to the admin index if no comment is found.
	 */
	public function findById($id)
    {
        // Look for a comment with the corresponding ID.
        $comment = Comment::where('id', $id)->first();

        if (!$comment) {
            // No comment found.
        	Redirect::to('admin/comments')
                ->with('error', Lang::get('admin/comments/messages.does_not_exist'))
                ->send();
        	exit;
        }

        // Return our comment.
        return $comment;
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  input from POST $data POST data from the create form.
     * @return redirect       redirect to the admin edit page of the new post, or back to the form in case of validation error.
     */
    public function store($data)
    {
        // Not a method used by the AdminCommentsController.
        // Will be coded when going over the front end part of the Comment model.
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  int $id   ID of the comment.
     * @param  input from PUT $data data from the edit form.
     * @return redirect       [description]
     */
	public function update($id, $data)
	{
        // Find the comment.
		$comment = $this->findById($id);

		// Validate the input.
    	$validator = Validator::make($data, Comment::$rules);

        if($validator->fails()) {
            Redirect::to('admin/comments/' . $comment->id . '/edit')
                ->with('error', Lang::get('admin/comments/messages.update.failure'))
                ->send();
            exit;
        }

        // Save if valid.
        $comment->update($data);

        // Redirect to the newly created comment admin edit page.
        Redirect::to('admin/comments/' . $comment->id . '/edit')
        	->with('success', Lang::get('admin/comments/messages.update.success'))
        	->send();
        exit;
	}

    /**
     * Remove the specified comment from storage.
     *
     * @param  int $id ID of the comment.
     * @return Redirect     Message regarding the results of the deletion.
     */
    public function destroy($id)
    {
        // Find the comment.
        $comment = $this->findById($id);

        // Delete the comment.
        $comment->delete();

        // Check for deletion and redirect.
        if (!Comment::find($id)) {
            Redirect::to('admin/comments')
                ->with('success', Lang::get('admin/comments/messages.delete.success'))
                ->send();
        } else {
            Redirect::to('admin/comments')
                ->with('error', Lang::get('admin/comments/messages.delete.error'))
                ->send();
        }
    }

    /**
     * Show a list of all the comments formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $comments = Comment::leftjoin('posts', 'posts.id', '=', 'comments.post_id')
                        ->leftjoin('users', 'users.id', '=','comments.user_id' )
                        ->select(array('comments.id as id', 'posts.id as postid','users.id as userid', 'comments.content', 'posts.title as post_name', 'users.username as poster_name', 'comments.created_at'));

        return Datatables::of($comments)

        ->edit_column('content', '<a href="{{{ URL::to(\'admin/comments/\'. $id .\'/edit\') }}}"
                                    class="iframe">{{{ Str::limit($content, 40, \'...\') }}}</a>')

        ->edit_column('post_name', '<a href="{{{ URL::to(\'admin/posts/\'. $postid .\'/edit\') }}}"
                                    class="iframe">{{{ Str::limit($post_name, 40, \'...\') }}}</a>')

        ->edit_column('poster_name', '<a href="{{{ URL::to(\'admin/users/\'. $userid .\'/edit\') }}}"
                                    class="iframe">{{{ $poster_name }}}</a>')

        ->add_column('actions', '<a href="{{{ URL::to(\'admin/comments/\' . $id . \'/edit\' ) }}}"
                                    class="iframe btn btn-mini">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="#delete-modal"
                                    class="delForm btn btn-mini btn-danger"
                                    data-toggle="modal"
                                    data-id="{{{ $id }}}">{{{ Lang::get(\'button.delete\') }}}</a>
        ')

        ->remove_column('id')
        ->remove_column('postid')
        ->remove_column('userid')

        ->make();
    }
}