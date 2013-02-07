<?php

use BigElephant\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Get the user full name.
     *
     * @access   public
     * @return   string
     */
    public function fullName()
    {
        return $this->username;
//        return $this->first_name . ' ' . $this->last_name;
    }

    public function publishedDate()
    {
        return date('d-m-y', strtotime($this->created_at));
    }
}