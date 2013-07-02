<?php
namespace admin;

use BaseController;
use PostRepositoryInterface;
use Post;
use Comment;
use Lang;
use View;
use Redirect;
use Input;
use Datatables;

/*
|--------------------------------------------------------------------------
| Admin Post Controller
|--------------------------------------------------------------------------
|
| Post resource management.
|
*/

class PostController extends BaseController {

	/**
     * Post Repository Interface
     *
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * Create a new controller instance
     *
     * Inject the repository interfaces.
     *
     * @param RoleRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        parent::__construct();
        $this->posts = $posts;
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * Display a listing of the posts
     *
     * @return View
     */
    public function index()
    {
        // Get the data needed for the view.
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/posts/title.post_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin/posts/index', compact('meta'));
    }

    /**
     * Show the form for creating a new post
     *
     * @return View
     */
    public function create()
    {
        // Get the data needed for the view.
        $rules = Post::$rules;
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/posts/title.create_a_new_post');

        // Show the create post form page.
        return View::make('admin/posts/create', compact( 'meta', 'rules'));
    }

    /**
     * Stores a new post account
     *
     * @return Redirect
     */
    public function store()
    {
        $post = $this->posts->store(Input::all());

        // Handle the repository possible errors.
        if(is_array($post)) {
            $errors = $post['message'];
            return Redirect::action('admin\PostController@create')
                            ->withErrors($errors)
                            ->withInput(Input::all());
        } else {
            // Redirect with success message.
            return Redirect::action('admin\PostController@edit', $post->id)
                            ->with('success', Lang::get('admin/posts/messages.create.success'));
        }
    }

	/**
    * Display the specified post
    *
    * @param  int $id
    *
    * @return method We only want to edit posts in the administration.
    */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing a post
     *
     * @return view
     */
    public function edit($id)
    {
        $post = $this->posts->findById($id);

        // Handle the repository possible errors.
        if(is_array($post)) {
            return Redirect::action('admin\PostController@index')
                            ->with('error', Lang::get('admin/posts/messages.does_not_exist'));
        }

        // Get the data needed for the view.
        $rules = Post::$updateRules;
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/posts/title.post_update');

        // Show the edit post form page.
        return View::make('admin/posts/edit', compact('post', 'meta', 'rules'));
    }

    /**
    * Update the specified post
    *
    * @param int $id
    * @return Response
    */
    public function update($id)
    {
        // Update the post with the PUT request data.
        $post = $this->posts->update($id, Input::all());

        // Handle the repository possible errors.
        if(is_array($post)) {
            $errors = $post['message'];
            return Redirect::action('admin\PostController@edit', $id)
                            ->withErrors($errors)
                            ->withInput(Input::all());
        } else {
            // Redirect with success message.
            return Redirect::action('admin\PostController@edit', $id)
                            ->with('success', Lang::get('admin/posts/messages.update.success'));
        }
    }

    /**
    * Remove the specified post
    *
    * @param int $id
    *
    * @return Response
    */
    public function destroy($id)
    {
        // Delete a post with the corresponding ID.
        $post = $this->posts->destroy($id);

        // Handle the repository possible errors.
        if(is_array($post)) {
            $errors = $post['message'];
            if ($post['code'] === '403') {
                $message = Lang::get('admin/posts/messages.delete.impossible');
            } else {
                $message = Lang::get('admin/posts/messages.delete.error');
            }
            return Redirect::action('admin\PostController@index')
                            ->with('error', $message);
        } else {
            // Redirect with success message.
            return Redirect::action('admin\PostController@index')
                            ->with('success', Lang::get('admin/posts/messages.delete.success'));
        }
    }


    /**
	* Show a list of all the posts formatted for Datatables.
	*
	* @return Datatables JSON
	*/
    public function data()
    {
        $posts = Post::leftjoin('users', 'users.id', '=' , 'posts.user_id')
                    ->select(array('posts.id', 'posts.title', 'posts.title as comments', 'users.username as poster', 'posts.created_at'));

        return Datatables::of($posts)
        ->edit_column('comments', '{{ Comment::where(\'post_id\', $id)->count() }}')
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