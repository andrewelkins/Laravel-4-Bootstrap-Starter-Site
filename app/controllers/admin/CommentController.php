<?php
namespace admin;

use BaseController;
use CommentRepositoryInterface;
use Comment;
use Lang;
use View;
use Redirect;
use Input;
use Datatables;

/*
|--------------------------------------------------------------------------
| Admin Comment Controller
|--------------------------------------------------------------------------
|
| Comment resource management.
|
*/

class CommentController extends BaseController {

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
     * @param CommentRepositoryInterface $comments
     */
    public function __construct(CommentRepositoryInterface $comments)
    {
        parent::__construct();
        $this->comments = $comments;
        $this->meta = array(
            'title' => 'Default',
            'author' => 'Me',
            'keywords' => 'Keywords',
            'description' => 'Description'
        );
    }

    /**
     * Display a listing of the comments
     *
     * @return View
     */
    public function index()
    {
        // Get the data needed for the view.
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/comments/title.comment_management');

        // There is no need to send any data to the view.
        // The datatables will be calling the getData method.
        return View::make('admin/comments/index', compact('meta'));
    }

    /**
    * Display the specified comment
    *
    * @param  int $id
    *
    * @return method We only want to edit comments in the administration.
    */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing a comment
     *
     * @return View
     */
    public function edit($id)
    {
        $comment = $this->comments->findById($id);

        // Handle the repository possible errors.
        if(is_array($comment)) {
            return Redirect::action('admin\CommentController@index')
                            ->with('error', Lang::get('admin/comments/messages.does_not_exist'));
        }

        // Get the data needed for the view.
        $rules = Comment::$rules;
        $meta = $this->meta;
        $meta['title'] = Lang::get('admin/comments/title.comment_update');

        // Show the edit comment form page.
        return View::make('admin/comments/edit', compact('comment', 'meta', 'rules'));
    }

    /**
    * Update the specified comment
    *
    * @param int $id
    *
    * @return Response
    */
    public function update($id)
    {
        // Update the comment with the PUT request data.
        $comment = $this->comments->update($id, Input::all());

        // Handle the repository possible errors.
        if(is_array($comment)) {
            $errors = $comment['message'];
            return Redirect::action('admin\CommentController@edit', $id)
                            ->withErrors($errors)
                            ->withInput(Input::all());
        } else {
            return Redirect::action('admin\CommentController@edit', $id)
                            ->with('success', Lang::get('admin/comments/messages.update.success'));
        }
    }

    /**
    * Remove the specified comment
    *
    * @param int $id
    *
    * @return Response
    */
    public function destroy($id)
    {
        // Delete a comment with the corresponding ID.
        $comment = $this->comments->destroy($id);

        // Handle the repository possible errors.
        if(is_array($comment)) {
            $errors = $comment['message'];
            if ($comment['code'] === '403') {
                $message = Lang::get('admin/comments/messages.delete.impossible');
            } else {
                $message = Lang::get('admin/comments/messages.delete.error');
            }
            return Redirect::action('admin\CommentController@index')
                            ->with('error', $message);
        } else {
            // Redirect with success message.
            return Redirect::action('admin\CommentController@index')
                            ->with('success', Lang::get('admin/comments/messages.delete.success'));
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