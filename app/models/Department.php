<?php
/**
 * Project : ctneventor
 * User: thuytien
 * Date: 11/14/2014
 * Time: 10:00 PM
 */

class Department extends Eloquent {
    public function created_at()
    {
        return $this->date($this->created_at);
    }
    //Department has many user
    public function users()
    {
        return $this->hasMany('User');
    }

}