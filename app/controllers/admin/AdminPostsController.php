<?php

class AdminPostsController extends AdminController {


    /**
     * Post Repository Interface
     *
     * @var Posts
     */
    protected $posts;

    /**
     * Inject the models.
     *
     * @param PostRepositoryInterface $posts
     *
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        parent::__construct();
        $this->posts = $posts;
    }

    /**
     * Display a listing of the posts.
     *
     * @return View
     */
    public function index()
    {
        // Set the page title.
        $title = Lang::get('admin/posts/title.post_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin.posts.index', compact('title'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return View
     */
    public function create()
    {
        // Set the page title.
        $title = Lang::get('admin/posts/title.create_a_new_post');

        // Show the create user form page.
        return View::make('admin/posts/create', compact('title'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Redirect to the post page or the create method if validation does not pass.
     */
    public function store()
    {
        // Create a post with the POST request data.
        $this->posts->store( Input::all() );
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Method
     */
    public function show($id)
    {
        $post = $this->posts->findById($id);

        return $this->edit($id);

    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        // Check if we have a user with this $id.
        $post = $this->posts->findById($id);

        // Set the page title.
        $title = Lang::get('admin/posts/title.post_update');

        // Show the edit form page.
        return View::make('admin/posts/edit', compact('post', 'title'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // Update the user with the PUT request data.
        $this->posts->update($id, Input::all());
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // Delete a post with the corresponding ID.
        $this->posts->destroy($id);
    }

    /**
     * Show a list of posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $data = $this->posts->data();

        return $data;
    }
}