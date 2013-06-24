<?php

class AdminCommentsController extends AdminController {

    /**
     * Comment Repository Interface
     *
     * @var Comment
     */
    protected $comments;

    /**
     * Inject the models.
     *
     * @param CommentRepositoryInterface $comments
     *
     */
    public function __construct(CommentRepositoryInterface $comments)
    {
        parent::__construct();
        $this->comments = $comments;
    }

    /**
     * Display a listing of the comments.
     *
     * @return View
     */
    public function index()
    {
        // Set the page title.
        $title = Lang::get('admin/comments/title.comment_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin.comments.index', compact('title'));
    }

    /**
     * Show the form for creating a new comment.
     *
     */
    public function create()
    {
        // This is a frontend only function for now.
        // No routes will trigger this method.
    }

    /**
     * Store a newly created comment in storage.
     *
     */
    public function store()
    {
        // This is a frontend only function for now.
        // No routes will trigger this method.
    }

    /**
     * Display the specified comment.
     *
     * @param  int  $id
     * @return Method
     */
    public function show($id)
    {
        $comment = $this->comments->findById($id);

        return $this->edit($id);

    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        // Check if we have a user with this $id.
        $comment = $this->comments->findById($id);

        // Set the page title.
        $title = Lang::get('admin/comments/title.comment_update');

        // Show the edit form page.
        return View::make('admin/comments/edit', compact('comment', 'title'));
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Update the user with the PUT request data.
        $this->comments->update($id, Input::all());
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // Delete a comment with the corresponding ID.
        $this->comments->destroy($id);
    }

    /**
     * Show a list of comments formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $data = $this->comments->data();

        return $data;
    }
}