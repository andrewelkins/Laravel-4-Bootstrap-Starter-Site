<?php

class AdminCommentsController extends AdminController {


    /**
     * Show a list of all the comment posts.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the comment posts
        $comments = Comment::orderBy('created_at', 'DESC')->paginate(10);

        // Show the page
        return View::make('admin/comments/index', compact('comments'));
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function getEdit($id)
	{

        // Check if the comment post exists
        if (is_null($comment = Comment::find($id)))
        {
            // Redirect to the comments management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.does_not_exist'));
        }

        // Show the page
        return View::make('admin/comments/edit', compact('comment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function postEdit($id)
	{
        // Check if the comment post exists
        if (is_null($comment = Comment::find($id)))
        {
            // Redirect to the comments management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.does_not_exist'));
        }

        // Declare the rules for the form validation
        $rules = array(
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the comment post data
            $comment->content = Input::get('content');
            
            // Was the comment post updated?
            if($comment->save())
            {
                // Redirect to the new comment post page
                return Redirect::to('admin/comments/' . $id . '/edit')->with('success', Lang::get('admin/comments/messages.update.success'));
            }

            // Redirect to the comments post management page
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
	public function getDelete($id)
	{

        // Check if the comment post exists
        if (is_null($comment = Comment::find($id)))
        {
            // Redirect to the comments management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.not_found'));
        }

        // Declare the rules for the form validation
        $rules = array(
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the comment post data
            $comment->content = Input::get('content');

            // Was the comment post updated?
            if($comment->save())
            {
                // Redirect to the new comment post page
                return Redirect::to('admin/comments/' . $id . '/edit')->with('success', Lang::get('admin/comments/messages.update.success'));
            }

            // Redirect to the comments post management page
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

        // Check if the comment post exists
        if (is_null($comment = Comment::find($id)))
        {
            // Redirect to the comments management page
            return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.not_found'));
        }

        // Was the comment post deleted?
        if($comment->delete())
        {
            // Redirect to the comment posts management page
            return Redirect::to('admin/comments')->with('success', Lang::get('admin/comments/messages.delete.success'));
        }

        // There was a problem deleting the comment post
        return Redirect::to('admin/comments')->with('error', Lang::get('admin/comments/messages.delete.error'));
	}

}