<?php
namespace frontend;

use BaseController;
use PostRepositoryInterface;
use CommentRepositoryInterface;
use Lang;
use View;
use Auth;
use App;
use Input;
use Redirect;

/*
|--------------------------------------------------------------------------
| Home Controller
|--------------------------------------------------------------------------
*/

class HomeController extends BaseController {

    /**
     * Post Repository Interface
     *
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * Comment Repository Interface
     *
     * @var CommentRepositoryInterface
     */
    protected $comments;

    /**
     * Create a new controller instance
     *
     * Inject the repository interfaces.
     *
     * @param RoleRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts, CommentRepositoryInterface $comments)
    {
        parent::__construct();
        $this->posts = $posts;
        $this->comments = $comments;
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * Display a list of 10 posts in the home page
     *
     * @return View
     */
	public function getIndex()
	{
        // Get the data needed for the view.
        $posts = $this->posts->paginateAllDesc(10);
        $meta = $this->meta;
        $meta['title'] = 'Home Page';

        // Show the posts index.
		return View::make('frontend/post/index', compact('posts', 'meta'));
	}

    /**
     * View a blog post.
     *
     * @param  string  $slug
     * @return View
     * @throws NotFoundHttpException
     */
    public function getView($slug)
    {
        // Get this post data
        $post = $this->posts->findBySlug($slug);

        // Handle the repository possible errors.
        if(is_array($post)) {
            return App::abort(404);
        }

        // Get this post comments
        $comments = $this->comments->findByPostDesc($post->id);

        // Get current user and check permission
        if(Auth::check()) {
            $user = Auth::user();
        }
        else {
            $user = null;
        }
        $canComment = false;
        if(!empty($user)) {
            $canComment = $user->can('post_comment');
        }

        $meta = $this->meta;
        $meta['keywords'] = $post->meta_keywords;
        $meta['description'] = $post->meta_description;
        $meta['title'] = $post->meta_title;

        // Show the page
        return View::make('frontend/post/view', compact('meta', 'post', 'comments', 'canComment'));
    }

    /**
     * Create a post comment
     *
     * @param  string  $slug
     * @return Redirect
     */
    public function postView($slug)
    {

        $user = Auth::user();
        $canComment = $user->can('post_comment');
        if (!$canComment) {
            return Redirect::to($slug . '#comments')->with('error', 'You need to be logged in to post comments!');
        }

        // Get this post data
        $post = $this->posts->findBySlug($slug);

        $comment = $this->comments->store($post->id, Input::all());

        // Handle the repository possible errors.
        if(is_array($comment)) {
            $errors = $comment['message'];
            return Redirect::action('frontend\HomeController@getView', $post->slug)
                            ->withErrors($errors)
                            ->withInput(Input::all());
        } else {
            // Redirect with success message.
            return Redirect::action('frontend\HomeController@getView', $post->slug)
                            ->with('success', Lang::get('admin/comments/messages.create.success'));
        }
    }

}