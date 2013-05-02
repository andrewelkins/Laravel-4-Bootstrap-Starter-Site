<?php

use Robbo\Presenter\PresentableInterface;

class Comment extends Eloquent implements PresentableInterface{

	/**
	 * Get the date the post was created.
	 *
	 * @return string
	 */
	public function date()
	{
		return ExpressiveDate::make($this->created_at)->getRelativeDate();
	}

	/**
	 * Get the comment's content.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the comment's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the comment's post's.
	 *
	 * @return Blog\Post
	 */
	public function post()
	{
		return $this->belongsTo('Post');
	}

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return ExpressiveDate::make($this->created_at)->getRelativeDate();
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return ExpressiveDate::make($this->updated_at)->getRelativeDate();
    }

    public function getPresenter()
    {
        return new CommentPresenter($this);
    }
}
