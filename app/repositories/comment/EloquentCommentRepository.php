<?php

/**
 * Repository for the Comment model using Eloquent ORM
 */
class EloquentCommentRepository implements CommentRepositoryInterface {

    /**
     * All comments
     *
     * @return object All comments.
     */
    public function findAll()
    {
        return Comment::all();
    }

    /**
     * All Comments by descending creation date
     *
     * @return object All comments.
     */
    public function findByPostDesc($postId)
    {
        return Comment::where('post_id', '=', $postId)->orderBy('created_at', 'ASC')->get();
    }

    /**
     * Specified comment by id
     *
     * @param  int $id ID of the comment
     *
     * @return object Specified comment.
     */
    public function findById($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            $error = array(
                'code'    => '404',
                'message' => 'Comment Not Found'
            );
            return $error;
        }
        return $comment;
    }

    /**
     * Store a new comment
     *
     * @param  array $data POST data from the request.
     *
     * @return object Created comment.
     */
    public function store($postId, $data)
    {
        $validator = $this->validate($data, Comment::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $comment = Comment::create($data);

         if ($comment->id) {
            // Additional data
            $user = Auth::user();
            $comment->user_id = $user->id;
            $comment->post_id = $postId;
            $comment->save();
            return $comment;
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
     * Update the specified comment
     *
     * @param  int   $id   ID of the comment.
     * @param  array $data PUT data from the request.
     *
     * @return object Updated comment.
     */
    public function update($id, $data)
    {
        // Find the comment.
        $comment = $this->findById($id);

        $validator = $this->validate($data, Comment::$rules);

        // Check if validator returned an array with the error code and the message
        if (is_array($validator)) return $validator;

        $comment->update($data);

        return $comment;
    }

    /**
    * Delete the specified comment
    *
    * @param  int $id ID of the comment.
    *
    * @return
    */
    public function destroy($id)
    {
        // Find the comment.
        $comment = $this->findById($id);

        // Delete the comment.
        $comment->delete();

        // Check for deletion and redirect.
        if (!Comment::find($id)) {
            return 'success';
        } else {
            $error = array(
                'code'    => '404',
                'message' => 'Can Not Delete Comment'
            );
            return $error;
        }
    }

    /**
     * Create a new Confide comment object
     *
     * @param  array  $data Comment data
     *
     * @return object Comment object
     */
    public function instance($data = array())
    {
        return new Comment($data);
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